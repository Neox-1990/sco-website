<?php

namespace App\Http\Requests;

use App;
use App\Team;
use App\Invite;
use App\Driver;
use Carbon\Carbon;

use App\Events\TeamCreateEvent;
use Illuminate\Foundation\Http\FormRequest;

class CreateTeam extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
        'teamname' => 'required|max:255',
        'teamcar' => 'required|integer',
        'teamnumber' => 'required|integer|max:999',
        'iracing_teamid' => 'required|integer|max:9999999',
        'website' => 'nullable|max:255',
        'twitter' => 'nullable|max:255',
        'facebook' => 'nullable|max:255',
        'instagram' => 'nullable|max:255',
      ];
        for ($i = 1; $i <= config('constants.driver_limits')['max']; $i++) {
            if ($i <= config('constants.driver_limits')['min']) {
                $rules["driver$i.iracingid"]= "required|numeric|max:9999999";
            } else {
                $rules["driver$i.iracingid"]  = "nullable|required_with:driver$i.name|numeric|max:9999999";
            }
        }
        $rules['*.iracingid'] = 'distinct';
        //dd($rules);
        return $rules;

        //return [];
    }

    public function messages()
    {
        $messages = [
        'teamname.required' => 'A teamname is required',
        'teamname.max' => 'Teamname is to long (max 255)',
        'teamcar.required' => 'You need to select a car',
        'teamcar.integer' => 'Don\'t tinker with the fucking page',
        'teamnumber.required' => 'A teamnumber is required',
        'teamnumber.integer' => 'Don\'t tinker with the fucking page',
        'teamnumber.max' => 'The teamnumber is to large',
        'iracing_teamid.required' => 'iRacing teamid is missing',
        'iracing_teamid.integer' => 'Pleaser enter only numbers as teamid',
        'iracing_teamid.max' => 'iRacing teamid is to large'
      ];

        for ($i = 1; $i <= config('constants.driver_limits')['max']; $i++) {
            $messages["driver$i.iracingid.required"] = "Driver $i iRacing ID required";
            $messages["driver$i.iracingid.numeric"] = "Driver $i iRacing ID must be a number";
            $messages["driver$i.iracingid.max"] = "Driver $i iRacing ID to long";
        }

        return $messages;
    }

    /**
     * Checks if drivers are free for this season
     */
    public function checkDrivers()
    {
        $error_list = [];
        //Check if Drivers are already in a team
        for ($i = 1; $i <= config('constants.driver_limits')['max']; $i++) {
            $iracingid = $this->input('driver'.$i.'.iracingid');
            if ($iracingid != '' || $iracingid != null) {
                $count = Driver::where('iracing_id', intval($iracingid))->count();
                if ($count>0) {
                    $driver = Driver::where('iracing_id', intval($iracingid))->with('teams')->first();
                    foreach ($driver->teams as $team) {
                        if ($team['season_id'] == config('constants.current_season')) {
                            $error_list ['driver'.$i] = "Driver $i is already registered with another team.";
                        }
                    };
                } else {
                    if (Driver::createFromIRacingID($iracingid) === false) {
                        $error_list ['driver'.$i] = "The ID of Driver $i doesnt exist";
                    }
                }
            }
        }
        //dd($error_list);
        return $error_list;
    }

    /**
     * Checks the unique'ness of the given Team
     *
     * @return array [Errors]
     */
    public function checkTeam()
    {
        //Test Unique Teamname
        $error_list = [];
        $count = App\Team::where([
          ['name','=',$this->input('teamname')],
          ['season_id','=',config('constants.current_season')]
        ])->count();
        if ($count>0) {
            $error_list['teamname'] = 'A team with the same name is already registered for this season';
        }

        //Test Unique Teamnumber
        $count = App\Team::where([
          ['number','=',$this->input('teamnumber')],
          ['season_id','=',config('constants.current_season')]
        ])->count();

        if ($count>0) {
            $error_list['teamnumber'] = 'A team with the same number is already registered for this season';
        }

        //Test Unique TeamID
        $count = App\Team::where([
          ['ir_teamid','=',$this->input('iracing_teamid')],
          ['season_id','=',config('constants.current_season')]
        ])->count();

        if ($count>0) {
            $error_list['iracing_teamid'] = 'A team with the same iRacing Team ID is already registered for this season';
        }

        //Test Valid Car Number
        $carToClass = [];
        foreach (config('constants.classes')[config('constants.current_season')] as $class => $cars) {
            foreach ($cars as $value) {
                $carToClass[$value] = $class;
            }
        }
        $min = config('constants.classNumbers')[config('constants.current_season')][$carToClass[$this->input('teamcar')]]['min'];
        $max = config('constants.classNumbers')[config('constants.current_season')][$carToClass[$this->input('teamcar')]]['max'];
        if (!($this->input('teamnumber')<=$max && $this->input('teamnumber')>=$min)) {
            $error_list['teamnumber_invalid'] = 'Your choosen number is not in the numberrange for your choosen car';
        }

        //Test if Invite is valid if used
        if ($this->filled('useinvite')) {
            if (Invite::where([['user_id','=', auth()->user()->id],['season_id', '=', config('constants.current_season')],['used', '=', null]])->count() <= 0) {
                $error_list['invite_invalid'] = 'You don\'t have a valid invite';
            }
        }
        //dd($error_list);
        return $error_list;
    }

    public function enterTeam()
    {
        $driverIds = [];
        $team_postfix = '';
        if ($this->filled('useinvite')) {
            $team_postfix = ' *** ';
            $invite = Invite::where([['user_id','=', auth()->user()->id],['season_id', '=', config('constants.current_season')],['used', '=', null]])->first();
            $invite->used = Carbon::now().'';
            $invite->save();
        }

        //Add Drivers in DB and store in Array
        for ($i=1; $i < 7; $i++) {
            if ($this->input('driver'.$i.'.iracingid') != null && $this->input('driver'.$i.'.iracingid') != '') {
                $count = Driver::where('iracing_id', intval($this->input('driver'.$i.'.iracingid')))->count();
                if ($count > 0) {
                    $driver = Driver::where('iracing_id', intval($this->input('driver'.$i.'.iracingid')))->first();
                    $driver->updateMe();
                    array_push($driverIds, $driver->id);
                } else {
                    $driver = Driver::createFromIRacingID($this->input('driver'.$i.'.iracingid'));
                    $driver->save();
                    array_push($driverIds, $driver->id);
                }
            }
        }
        //Create Team
        $team = new App\Team;
        $team->user_id = $this->user()->id;
        $team->season_id = config('constants.current_season');
        $team->name = trim($this->input('teamname')).$team_postfix;
        $team->number = $this->input('teamnumber');
        $team->car = $this->input('teamcar');
        $team->status = 0;
        $team->ir_teamid = $this->input('iracing_teamid');
        $team->preqtime = 0;
        $team->website = $this->httpLinkChecker($this->input('website', null), false);
        $team->twitter = $this->httpLinkChecker($this->input('twitter', null));
        $team->facebook = $this->httpLinkChecker($this->input('facebook', null));
        $team->instagram = $this->httpLinkChecker($this->input('instagram', null));
        $team->save();
        $team->drivers()->attach($driverIds); //Add drivers

        event(new TeamCreateEvent($team));
    }

    private function httpLinkChecker($url, $forceHttps = true)
    {
        if (\is_null($url)) {
            return null;
        }
        if (\substr($url, 0, 7) != 'http://' && \substr($url, 0, 8) != 'https://') {
            if ($forceHttps) {
                $url = 'https://'.$url;
            } else {
                $url = 'http://'.$url;
            }
        }
        return $url;
    }
}
