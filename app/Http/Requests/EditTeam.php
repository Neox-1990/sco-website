<?php

namespace App\Http\Requests;

use App;
use App\Team;
use App\Driver;
use App\Setting;
use App\Events\TeamEditEvent;
use App\Events\TeamCarChangeEvent;
use Carbon\Carbon;
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
        'website' => 'nullable|max:255',
        'twitter' => 'nullable|max:255',
        'facebook' => 'nullable|max:255',
        'instagram' => 'nullable|max:255',

        'driver.iracingid' => 'nullable|numeric|required_with:addDriver|max:9999999',

        'driverID' => 'nullable|numeric|required_with:removeDriver|max:9999999'
    ];
    }
    public function check(Team $team)
    {
        $checkResult;
        if ($this->input('removeDriver') !== null) {
            $checkResult = $this->removeDriver($team);
        } elseif ($this->input('addDriver') !== null) {
            $checkResult = $this->addDriver($team);
        } elseif ($this->input('updateTeamdata') !== null) {
            $checkResult = $this->updateTeamdata($team);
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
          ['season_id','=',config('constants.current_season')]
        ])->count();

        if ($count >= 1 && $team->name != $this->input('teamname')) {
            $checkResult['legit'] = false;
            $checkResult['errors']['noUniqueTeam'] = 'There already is a team with this name in the current season';
        }

        $count = App\Team::where([
          ['number','=',$this->input('teamnumber')],
          ['season_id','=',config('constants.current_season')]
        ])->count();

        $carToClass = [];
        foreach (config('constants.classes')[config('constants.current_season')] as $class => $cars) {
            foreach ($cars as $value) {
                $carToClass[$value] = $class;
            }
        }
        $min = config('constants.classNumbers')[config('constants.current_season')][$carToClass[$this->input('teamcar')]]['min'];
        $max = config('constants.classNumbers')[config('constants.current_season')][$carToClass[$this->input('teamcar')]]['max'];
        if (!($this->input('teamnumber')<=$max && $this->input('teamnumber')>=$min)) {
            $checkResult['legit'] = false;
            $checkResult['errors']['numberOutOfRange'] = 'You choose a number that is outside of the numberrange for the car';
        }


        if ($count >= 1 && $team->number != $this->input('teamnumber')) {
            $checkResult['legit'] = false;
            $checkResult['errors']['noUniqueNumber'] = 'There already is a team with this number in the current season';
        }

        $count = App\Team::where([
          ['ir_teamid','=',$this->input('iracing_teamid')],
          ['season_id','=',config('constants.current_season')]
        ])->count();

        if ($count >= 1 && $team->ir_teamid != $this->input('iracing_teamid')) {
            $checkResult['legit'] = false;
            $checkResult['errors']['noUniqueTeamID'] = 'There already is a team with this iRacing Team ID in the current season';
        }

        if ($team->status != 0) {
            $checkResult['legit'] = false;
            $checkResult['errors']['confirmedTeamEdit'] = 'Only pending teams can change teamdata.';
        }


        if ($checkResult['legit']) {
            $carToClass = Team::getCarToClassArray();
            $carClassUpdate = $carToClass[$team->car] != $carToClass[$this->input('teamcar')];
            $team->name = $this->input('teamname');
            $team->number = $this->input('teamnumber');
            $team->car = $this->input('teamcar');
            $team->ir_teamid = $this->input('iracing_teamid');
            $team->save();
            $checkResult['flash'] = 'You successfully updated the data of '.$team->name;
            if ($carClassUpdate) {
                event(new TeamCarChangeEvent($team));
            } else {
                event(new TeamEditEvent($team, 'Team data updated'));
            }
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

        //enough drivers left in team
        $count = $team->drivers()->count();
        if ($count <= config('constants.driver_limits')['min']) {
            $checkResult['legit'] = false;
            $checkResult['errors']['driverTeamAmountError'] = 'Your team need at least '.config('constants.driver_limits')['min'].' drivers. Add a new driver first or delete the team alltogether.';
        }

        if ($checkResult['legit']) {
            $driver = Driver::where('id', $this->input('driverID'))->first();
            //dd($driver->id);
            $team->drivers()->detach($driver->id);
            $checkResult['flash'] = 'You removed the driver '.$driver->name.' from '.$team->name;
            event(new TeamEditEvent($team, 'Team driver removed', 'removed driver: <a href="/admin/drivers/'.$driver->id.'" title="'.$driver->name.'">'.$driver->id.'</a>'));
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

        if ($team->drivers()->count()>=config('constants.driver_limits')['max']) {
            $checkResult['legit'] = false;
            $checkResult['errors']['maxDriverLimit'] = 'There are already '.config('constants.driver_limits')['min'].' drivers in this team.';
            $checkResult['flash'] = 'An error occurred';
        } else {
            $count = Driver::where('iracing_id', $this->input('driver.iracingid'))->count();
            if ($count>0) {
                $driver = Driver::where('iracing_id', $this->input('driver.iracingid'))->first();
                $count = $driver->teams()->where('season_id', config('constants.current_season'))->count();
                if ($count>0) {
                    $checkResult['legit'] = false;
                    $checkResult['errors']['driverTakenError'] = 'The driver is already part of another team in this season.';
                    $checkResult['flash'] = 'An error occurred';
                } else {
                    $driver->updateMe();
                    $driver->save();
                    $team->drivers()->attach($driver->id);
                    $checkResult['flash'] = 'You successfully added '.$driver->name.' to '.$team->name;
                    event(new TeamEditEvent($team, 'Team driver added', 'added driver: <a href="/admin/drivers/'.$driver->id.'" title="'.$driver->name.'">'.$driver->id.'</a>'));
                }
            } else {
                $driver = Driver::createFromIRacingID($this->input('driver.iracingid'));
                $driver->save();
                $team->drivers()->attach($driver->id);
                $checkResult['flash'] = 'You successfully added '.$driver->name.' to '.$team->name;
                event(new TeamEditEvent($team, 'Team driver added', 'added driver: <a href="/admin/drivers/'.$driver->id.'" title="'.$driver->name.'">'.$driver->id.'</a>'));
            }
        }

        return $checkResult;
    }

    public function updateTeamdata(Team $team)
    {
        $checkResult = [
        'legit' => true,
        'errors' => [],
        'flash' => ''
        ];

        $team->website = $this->httpLinkChecker($this->input('website', null));
        $team->twitter = $this->httpLinkChecker($this->input('twitter', null));
        $team->facebook = $this->httpLinkChecker($this->input('facebook', null));
        $team->instagram = $this->httpLinkChecker($this->input('instagram', null));
        $team->save();

        $checkResult['flash'] = 'You successfully update the data of '.$team->name;
        return $checkResult;
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
