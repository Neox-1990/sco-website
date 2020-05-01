<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use App\User;
use App\Events\TeamEditEvent;
use App\Events\TeamDeleteEvent;
use App\Events\TeamStatusChangeEvent;
use App\Driver;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class TeamController extends Controller
{
    //
    public function index()
    {
        $teams = Team::getSortedTeams();
        $deletedTeams = Team::onlyTrashed()->where([['season_id','=',config('constants.current_season')]])->get();
        return view('admin.team.index', compact('teams', 'deletedTeams'));
    }

    public function list()
    {
        $teams = Team::getConfirmedTeams();
        return view('admin.team.list', compact('teams'));
    }

    public function edit(Team $team)
    {
        $drivers = $team->drivers()->get();
        $alldrivers = Driver::all()->filter(function ($driver, $key) {
            return $driver->teams->where('season_id', config('constants.current_season'))->count() == 0;
        })->sortBy('name');
        $cars = config('constants.car_names');
        $managers = User::all()->sortBy('name');
        return view('admin.team.edit', compact('team', 'cars', 'drivers', 'managers', 'alldrivers'));
    }

    public function update(Request $request, Team $team)
    {
        if ($request->has('confirm')) {
            $team->status = 4;
            $team->save();
            session()->flash('flash_message_success', 'Status of '.$team->name.' changed to: confirmed');
            event(new TeamStatusChangeEvent($team));
            event(new TeamEditEvent($team, 'Status set confirmed'));
            return redirect('admin/teams/');
        } elseif ($request->has('review')) {
            $team->status = 1;
            $team->save();
            session()->flash('flash_message_success', 'Status of '.$team->name.' changed to: reviewed');
            event(new TeamStatusChangeEvent($team));
            event(new TeamEditEvent($team, 'Status set reviewed'));
            return redirect('admin/teams/');
        } elseif ($request->has('waiting')) {
            $team->status = 2;
            $team->save();
            session()->flash('flash_message_success', 'Status of '.$team->name.' changed to: reserve');
            event(new TeamStatusChangeEvent($team));
            event(new TeamEditEvent($team, 'Status set reserve'));
            return redirect('admin/teams/');
        } elseif ($request->has('pending')) {
            $team->status = 0;
            $team->save();
            session()->flash('flash_message_success', 'Status of '.$team->name.' changed to: pending');
            event(new TeamStatusChangeEvent($team));
            event(new TeamEditEvent($team, 'Status set pending'));
            return redirect('admin/teams/');
        } elseif ($request->has('qualified')) {
            $team->status = 3;
            $team->save();
            session()->flash('flash_message_success', 'Status of '.$team->name.' changed to: qualified');
            event(new TeamStatusChangeEvent($team));
            event(new TeamEditEvent($team, 'Status set qualified'));
            return redirect('admin/teams/');
        } elseif ($request->has('teamdataupdate')) {
            $team->name = $request->input('teamname');
            $team->number = $request->input('teamnumber');
            $team->user_id = $request->input('teammanager');
            $team->car = $request->input('teamcar');
            $team->ir_teamid = $request->input('teamiracingid');
            $team->website = $request->input('website', null);
            $team->twitter = $request->input('twitter', null);
            $team->facebook = $request->input('facebook', null);
            $team->save();
            session()->flash('flash_message_success', 'Data of '.$team->name.' updated');
            event(new TeamEditEvent($team, 'Team data updated'));
            return redirect('admin/teams/'.$team['id']);
        } elseif ($request->has('driverremove')) {
            $team->drivers()->detach($request->input('driverid'));
            $team->save();
            $driver = Driver::where('id', $request->input('driverid'))->first();
            session()->flash('flash_message_success', 'You removed the driver from '.$team->name);
            event(new TeamEditEvent($team, 'Team driver removed', 'removed driver: <a href="admin/drivers/'.$request->input('driverid').'" title="'.$driver->name.'">'.$request->input('driverid').'</a>'));
            return redirect('admin/teams/'.$team['id']);
        } elseif ($request->has('driveradd')) {
            $team->drivers()->attach($request->input('driverid_add'));
            $team->save();
            $driver = Driver::where('id', $request->input('driverid_add'))->first();
            session()->flash('flash_message_success', 'You added the driver to '.$team->name);
            event(new TeamEditEvent($team, 'Team driver added', 'added driver: <a href="admin/drivers/'.$request->input('driverid_add').'" title="'.$driver->name.'">'.$request->input('driverid').'</a>'));
            return redirect('admin/teams/'.$team['id']);
        } else {
            session()->flash('flash_message_alert', 'Unknown Error');
            return redirect('admin/teams/');
        }
    }

    public function delete(Team $team)
    {
        if ($team->delete()) {
            session()->flash('flash_message_success', 'Team #'.$team->number.' '.$team->name.' (id:'.$team->id.') deleted');
            event(new TeamDeleteEvent($team));
        } else {
            session()->flash('flash_message_success', 'An error occurred');
        }
        return redirect('admin/teams/');
    }

    public function restore(Team $team)
    {
        if ($team->restore()) {
            session()->flash('flash_message_success', 'Team #'.$team->number.' '.$team->name.' (id:'.$team->id.') restored');
            event(new TeamEditEvent($team, 'Team restored'));
        } else {
            session()->flash('flash_message_success', 'An error occurred');
        }
        return redirect('admin/teams/');
    }

    public function updateTeamStatus(Request $request, Team $team)
    {
        $status = $request->input('newstatus');
        $team->status = $status;
        $success = $team->save();
        //$response;
        if ($success) {
            $response = $team->name." set to ".config('constants.status_names')[$status];

            event(new TeamStatusChangeEvent($team));
            event(new TeamEditEvent($team, 'Status set '.config('constants.status_names')[$status]));
        } else {
            $response = $team->name." coundt be set to ".config('constants.status_names')[$status];
        }
        return array(
          'success' => $success,
          'response' => $response,
          'status' => $status,
        );
    }
}
