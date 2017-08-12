<?php

namespace App\Http\Requests;

use App;
use App\Team;
use App\Driver;
use Illuminate\Foundation\Http\FormRequest;

class EditTeam extends FormRequest
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
        'teamname' => 'nullable|required_with_all:teamcar,teamnumber|required_with:updateTeamdata',
        'teamcar' => 'nullable|required_with_all:teamname,teamnumber|integer|required_with:updateTeamdata',
        'teamnumber' => 'nullable|required_with_all:teamname,teamcar|integer|required_with:updateTeamdata',

        'driver.name' => 'nullable|required_with:driver.iracingid|required_with:addDriver',
        'driver.iracingid' => 'nullable|required_with:driver.name|numeric|required_with:addDriver',
        'driver.ir' => 'nullable|required_with_all:driver.iracingid,driver.name|numeric|min:2000|required_with:addDriver',
        'driver.sr1' => 'nullable|required_with_all:driver.iracingid,driver.name|in:c,b,a,p|required_with:addDriver',
        'driver.sr2' => 'nullable|required_with_all:driver.iracingid,driver.name|numeric|required_with:addDriver',

        'driverID' => 'nullable|numeric|required_with:removeDriver'
    ];
    }
    public function check(Team $team)
    {
        $checkResult;
        if ($this->input('updateTeamdata') !== null) {
            //dd("Dataupdate");
            $checkResult = $this->teamDataUpdate($team);
        } elseif ($this->input('removeDriver') !== null) {
            //dd("Deletedriver");
            $checkResult = $this->removeDriver($team);
        } elseif ($this->input('addDriver') !== null) {
            //dd("Adddriver");
            $checkResult = $this->addDriver($team);
        } else {
            $checkResult = [
            'legit' => false,
            'errors' => [
              'consistencyerror' => 'Something went wrong. Did you manipulate the source?'
            ],
            'flash' => 'An error occurred'
          ];
        }
        return $checkResult;
    }

    private function teamDataUpdate(Team $team)
    {
        //
        $checkResult = [
          'legit' => true,
          'errors' => [],
          'flash' => ''
        ];

        $count = App\Team::where([
          ['name','=',$this->input('teamname')],
          ['season_id','=',config('constants.curent_season')]
        ])->count();

        if ($count >= 1 && $team->name != $this->input('teamname')) {
            $checkResult['legit'] = false;
            $checkResult['errors']['noUniqueTeam'] = 'There is already a team with this name in the current season';
        }

        if ($checkResult['legit']) {
            $team->name = $this->input('teamname');
            $team->number = $this->input('teamnumber');
            $team->car = $this->input('teamcar');
            $team->save();
            $checkResult['flash'] = 'You successfully updated the data of '.$team->name;
        } else {
            $checkResult['flash'] = 'An error occurred';
        }

        return $checkResult;
    }
    private function removeDriver(Team $team)
    {
        //
        $checkResult = [
          'legit' => true,
          'errors' => [],
          'flash' => ''
        ];

        //Check if Driver is part of the team
        $count = $team->drivers()->where('id', $this->input('driverID'))->count();
        if ($count == 0) {
            $checkResult['legit'] = false;
            $checkResult['errors']['driverTeamPartError'] = 'The driver you tried to remove isn\'t part of this team.';
        }

        $count = $team->drivers()->count();
        if ($count <= 2) {
            $checkResult['legit'] = false;
            $checkResult['errors']['driverTeamAmountError'] = 'Your team need at least two drivers. Add a new driver first or delete the team alltogether.';
        }

        if ($checkResult['legit']) {
            $driver = Driver::where('id', $this->input('driverID'))->first();
            $team->drivers()->detach($driver->id);
            $checkResult['flash'] = 'You removed the driver '.$driver->name.' from '.$team->name;
        } else {
            $checkResult['flash'] = 'An error occurred';
        }

        return $checkResult;
    }
    private function addDriver(Team $team)
    {
        //
        $checkResult = [
          'legit' => true,
          'errors' => [],
          'flash' => ''
        ];

        $count = Driver::where('iracing_id', $this->input('driver.iracingid'))->count();
        if ($count>0) {
            $driver = Driver::where('iracing_id', $this->input('driver.iracingid'))->first();
            $count = $driver->teams()->where('season_id', config('constants.curent_season'))->count();
            if ($count>0) {
                $checkResult['legit'] = false;
                $checkResult['errors']['driverTakenError'] = 'The driver is already part of another team in this season.';
                $checkResult['flash'] = 'An error occurred';
            } else {
                $driver->irating = $this->input('driver.ir');
                $driver->safetyrating = strtoupper($this->input('driver.sr1')).'@'.number_format(floatval($this->input('driver.sr2')), 2);
                $driver->save();
                $team->drivers()->attach($driver->id);
                $checkResult['flash'] = 'You successfully added '.$driver->name.' to '.$team->name;
            }
        } else {
            $driver = new Driver;
            $driver->name = $this->input('driver.name');
            $driver->iracing_id = $this->input('driver.iracingid');
            $driver->irating = $this->input('driver.ir');
            $driver->name = $this->input('driver.name');
            $driver->safetyrating = strtoupper($this->input('driver.sr1')).'@'.number_format(floatval($this->input('driver.sr2')), 2);
            $driver->save();
            $team->drivers()->attach($driver->id);
            $checkResult['flash'] = 'You successfully added '.$driver->name.' to '.$team->name;
        }

        return $checkResult;
    }
}
