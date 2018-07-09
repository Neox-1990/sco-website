<?php

namespace App\Http\Requests;

use App;
use App\Team;
use App\Invite;
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
        $ir_limit = config('constants.ir_limits')[config('constants.cars_to_classes')[config('constants.current_season')][$this->input('teamcar')]];

        $rules = [
        'teamname' => 'required|max:255',
        'teamcar' => 'required|integer',
        'teamnumber' => 'required|integer|max:999',
        'iracing_teamid' => 'required|integer|max:9999999'
      ];
        for ($i = 1; $i <= config('constants.driver_limits')['max']; $i++) {
            if ($i <= config('constants.driver_limits')['min']) {
                $rules["driver$i.name"]     = "required|max:255";
                $rules["driver$i.iracingid"]= "required|numeric|max:9999999";
                $rules["driver$i.ir"]       = "required|numeric|min:$ir_limit|max:12000";
                $rules["driver$i.sr1"]      = "required|in:c,b,a,p";
                $rules["driver$i.sr2"]      = "required|numeric|max:128";
            } else {
                $rules["driver$i.name"]       = "nullable|required_with:driver$i.iracingid|max:255";
                $rules["driver$i.iracingid"]  = "nullable|required_with:driver$i.name|numeric|max:9999999";
                $rules["driver$i.ir"]         = "nullable|required_with_all:driver$i.iracingid,driver$i.name|numeric|min:$ir_limit|max:12000";
                $rules["driver$i.sr1"]        = "nullable|required_with_all:driver$i.iracingid,driver$i.name|in:c,b,a,p";
                $rules["driver$i.sr2"]        = "nullable|required_with_all:driver$i.iracingid,driver$i.name|numeric|max:128";
            }
        }
        $rules['*.iracingid'] = 'distinct';
        //dd($rules);
        return $rules;

        //return [];
    }

    public function messages()
    {
        $ir_limit = config('constants.ir_limits')[config('constants.cars_to_classes')[config('constants.current_season')][$this->input('teamcar')]];

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
            $messages["driver$i.name.required"] = "Driver $i name required";
            $messages["driver$i.name.max"] = "Driver $i name to long";

            $messages["driver$i.iracingid.required"] = "Driver $i iRacing ID required";
            $messages["driver$i.iracingid.numeric"] = "Driver $i iRacing ID must be a number";
            $messages["driver$i.iracingid.max"] = "Driver $i iRacing ID to long";

            $messages["driver$i.ir.required"] = "Driver $i iRating is required";
            $messages["driver$i.ir.numeric"] = "Driver $i iRating must be a number";
            $messages["driver$i.ir.min"] = "Driver $i iRating must be at least $ir_limit";

            $messages["driver$i.sr1.required"] = "Driver $i license required";
            $messages["driver$i.sr1.in"] = "Driver $i license must be valid";

            $messages["driver$i.sr2.required"] = "Driver $i safety rating is required";
            $messages["driver$i.sr2.numeric"] = "Driver $i safety rating must be a number";
            $messages["driver$i.sr2.max"] = "Driver $i safety rating to high";

            $messages["driver$i.*.required_with_all"] = "Information missing for driver $i";
            $messages["driver$i.*.required_with"] = "Information missing for driver $i";
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
        $sr_limits = config('constants.sr_limits')[config('constants.cars_to_classes')[config('constants.current_season')][$this->input('teamcar')]];
        $sr_lower_limit = array_pop($sr_limits);
        //dd($sr_limits);
        for ($i = 1; $i <= config('constants.driver_limits')['max']; $i++) {
            $iracingid = $this->input('driver'.$i.'.iracingid');
            if ($iracingid != '' || $iracingid != null) {
                if (!(in_array($this->input('driver'.$i.'.sr1'), $sr_limits) || $this->input('driver'.$i.'.sr1') == $sr_lower_limit && $this->input('driver'.$i.'.sr2') >= 2)) {
                    $error_list ['driver'.$i] = "Driver $i does not fulfil the SR-requirements";
                }

                $count = App\Driver::where('iracing_id', intval($iracingid))->count();
                if ($count>0) {
                    $driver = App\Driver::where('iracing_id', intval($iracingid))->with('teams')->first();
                    foreach ($driver->teams as $team) {
                        if ($team['season_id'] == config('constants.current_season')) {
                            $error_list ['driver'.$i] = "Driver $i is already registered with another team.";
                        }
                    };
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
            if ($this->input('driver'.$i.'.iracingid') != null || $this->input('driver'.$i.'.iracingid') != '') {
                $count = App\Driver::where('iracing_id', intval($this->input('driver'.$i.'.iracingid')))->count();
                if ($count > 0) {
                    $driver = App\Driver::where('iracing_id', intval($this->input('driver'.$i.'.iracingid')))->first();
                    $driver->irating = intval($this->input('driver'.$i.'.ir'));
                    $driver->safetyrating = strtoupper($this->input('driver'.$i.'.sr1')).'@'.number_format(floatval($this->input('driver'.$i.'.sr2')), 2);
                    $driver->save();
                    array_push($driverIds, $driver->id);
                } else {
                    $driver = new App\Driver;
                    $driver->name = $this->input('driver'.$i.'.name');
                    $driver->iracing_id = $this->input('driver'.$i.'.iracingid');
                    $driver->irating = $this->input('driver'.$i.'.ir');
                    $driver->safetyrating = strtoupper($this->input('driver'.$i.'.sr1')).'@'.number_format(floatval($this->input('driver'.$i.'.sr2')), 2);
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
        $team->save();
        $team->drivers()->attach($driverIds); //Add drivers

        event(new TeamCreateEvent($team));
    }
}
