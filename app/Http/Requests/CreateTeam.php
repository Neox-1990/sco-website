<?php

namespace App\Http\Requests;

use App;
use App\Team;
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
        return [
          'teamname' => 'required|max:255',
          'teamcar' => 'required|integer',
          'teamnumber' => 'required|integer|max:999',
          'iracing_teamid' => 'required|integer|max:9999999',

          'driver1.name' => 'required|max:255',
          'driver1.iracingid' => 'required|numeric|max:9999999',
          'driver1.ir' => 'required|numeric|min:2000|max:12000',
          'driver1.sr1' => 'required|in:c,b,a,p',
          'driver1.sr2' => 'required|numeric|max:128',

          'driver2.name' => 'required|max:255',
          'driver2.iracingid' => 'required|numeric|max:9999999',
          'driver2.ir' => 'required|numeric|min:2000|max:12000',
          'driver2.sr1' => 'required|in:c,b,a,p',
          'driver2.sr2' => 'required|numeric|max:128',

          'driver3.name' => 'nullable|required_with:driver3.iracingid|max:255',
          'driver3.iracingid' => 'nullable|required_with:driver3.name|numeric|max:9999999',
          'driver3.ir' => 'nullable|required_with_all:driver3.iracingid,driver3.name|numeric|min:2000|max:12000',
          'driver3.sr1' => 'nullable|required_with_all:driver3.iracingid,driver3.name|in:c,b,a,p',
          'driver3.sr2' => 'nullable|required_with_all:driver3.iracingid,driver3.name|numeric|max:128',

          'driver4.name' => 'nullable|required_with:driver4.iracingid|max:255',
          'driver4.iracingid' => 'nullable|required_with:driver4.name|numeric|max:9999999',
          'driver4.ir' => 'nullable|required_with_all:driver4.iracingid,driver4.name|numeric|min:2000|max:12000',
          'driver4.sr1' => 'nullable|required_with_all:driver4.iracingid,driver4.name|in:c,b,a,p',
          'driver4.sr2' => 'nullable|required_with_all:driver4.iracingid,driver4.name|numeric|max:128',

          'driver5.name' => 'nullable|required_with:driver5.iracingid|max:255',
          'driver5.iracingid' => 'nullable|required_with:driver5.name|numeric|max:9999999',
          'driver5.ir' => 'nullable|required_with_all:driver5.iracingid,driver5.name|numeric|min:2000|max:12000',
          'driver5.sr1' => 'nullable|required_with_all:driver5.iracingid,driver5.name|in:c,b,a,p',
          'driver5.sr2' => 'nullable|required_with_all:driver5.iracingid,driver5.name|numeric|max:128',

          'driver6.name' => 'nullable|required_with:driver6.iracingid|max:255',
          'driver6.iracingid' => 'nullable|required_with:driver6.name|numeric|max:9999999',
          'driver6.ir' => 'nullable|required_with_all:driver6.iracingid,driver6.name|numeric|min:2000|max:12000',
          'driver6.sr1' => 'nullable|required_with_all:driver6.iracingid,driver6.name|in:c,b,a,p',
          'driver6.sr2' => 'nullable|required_with_all:driver6.iracingid,driver6.name|numeric|max:128',

          '*.iracingid' => 'distinct'
      ];

        //return [];
    }

    /**
     * Checks if drivers are free for this season
     */
    public function checkDrivers()
    {
        $error_list = [];
        for ($i = 1; $i < 7; $i++) {
            $iracingid = $this->input('driver'.$i.'.iracingid');
            if ($iracingid != '' || $iracingid != null) {
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
        return $error_list;
    }

    /**
     * Checks the unique'ness of the given Team
     *
     * @return array [Errors]
     */
    public function checkTeam()
    {
        $error_list = [];
        $count = App\Team::where([
          ['name','=',$this->input('teamname')],
          ['season_id','=',config('constants.current_season')]
        ])->count();
        if ($count>0) {
            $error_list['teamname'] = 'A team with the same name is already registered for this season';
        }

        $count = App\Team::where([
          ['number','=',$this->input('teamnumber')],
          ['season_id','=',config('constants.current_season')]
        ])->count();

        if ($count>0) {
            $error_list['teamnumber'] = 'A team with the same number is already registered for this season';
        }

        $count = App\Team::where([
          ['ir_teamid','=',$this->input('iracing_teamid')],
          ['season_id','=',config('constants.current_season')]
        ])->count();

        if ($count>0) {
            $error_list['iracing_teamid'] = 'A team with the same iRacing Team ID is already registered for this season';
        }

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

        return $error_list;
    }

    public function enterTeam()
    {
        $driverIds = [];
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
        $team->name = $this->input('teamname');
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
