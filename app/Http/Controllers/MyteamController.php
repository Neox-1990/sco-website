<?php

namespace App\Http\Controllers;

use App\Team;
use App\Round;
use App\Setting;
use App\Events\TeamDeleteEvent;
use App\Http\Requests\EditTeam;
use App\Http\Requests\CreateTeam;
use Carbon\Carbon;
use Illuminate\Http\Request;

//use Illuminate\Http\Request;

class MyteamController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = auth()->user();
        $teams = Team::with('drivers')
          ->where('user_id', $user->id)
          ->where('season_id', config('constants.curent_season'))
          ->get();
        return view('myteams.index', compact('teams'));
    }
    public function create()
    {
        $numbers = Team::getClassNumbers();
        return view('myteams.create', compact('numbers'));
    }
    public function store(CreateTeam $request)
    {
        $drivercheck = $request->checkDrivers();
        $teamcheck = $request->checkTeam();

        if (sizeof($drivercheck) != 0 || sizeof($teamcheck) != 0) {
            session()->flash('flash_message_alert', 'An error occured');
            return redirect()->back()->withErrors([
            'team_errors' => $teamcheck,
            'driver_errors' => $drivercheck
            ])->withInput();
        }
        $request->enterTeam();
        session()->flash('flash_message_success', 'You successfully created a new team for this season.');
        return redirect('/myteams/');
    }
    public function edit(Team $team)
    {
        $legit = false;
        if ($team->user()->first()->id == auth()->id() && $team->season()->first()->id == config('constants.curent_season')) {
            $legit = true;
        }
        if (!$legit) {
            session()->flash('flash_message_alert', 'An error occured');
        }
        $numbers = Team::getClassNumbers();
        $classcars = Team::getCarToClassArray();
        $carClass = $classcars[$team->car];
        foreach (config('constants.classes')[config('constants.curent_season')][$carClass] as $value) {
            $numbers[$value][$team->number] = $team->number;
        }
        $deadline = new Carbon((Setting::getSetup())['confirmed_carchange']);
        $deadline = $deadline->gt(new Carbon);
        $classcars = config('constants.classes')[config('constants.curent_season')][$carClass];

        $now = Carbon::now('UTC');
        //$now = new Carbon('2017-10-05 16:59:59', 'UTC');
        $end = (clone($now))->addDays(3)->subHours(2);
        $now->subHours(4);
        $race = Round::whereBetween('race_start', [$now->format('Y-m-d H:i:s'),$end->format('Y-m-d H:i:s')])->get();
        $driverChangeLimit = $team->status == 2 && $race->count()>0;

        return view('myteams.edit', compact('legit', 'team', 'numbers', 'deadline', 'classcars', 'driverChangeLimit'));
    }
    public function update(EditTeam $request, Team $team)
    {
        $legit = false;
        if ($team->user()->first()->id != auth()->id() || $team->season()->first()->id != config('constants.curent_season')) {
            session()->flash('flash_message_alert', 'An error occured');
            return view('myteams.edit', compact('legit', 'team'));
        }

        $checkResult = $request->check($team);
        if ($checkResult['legit']) {
            session()->flash('flash_message_success', $checkResult['flash']);
            return redirect('/myteams/edit/'.$team->id);
        } else {
            session()->flash('flash_message_alert', $checkResult['flash']);
            return redirect()
            ->back()
            ->withErrors($checkResult['errors'])
            ->withInput();
        }
    }
    public function delete(Team $team)
    {
        $legit = false;
        if ($team->user()->first()->id == auth()->id()) {
            $legit = true;
        }
        return view('myteams.delete', compact('legit', 'team'));
    }
    public function destroy(Request $request, Team $team)
    {
        if ($team->user()->first()->id != auth()->id()) {
            $legit = false;
            return view('myteams.delete', compact('legit', 'team'));
        } else {
            if ($request->input('delete') == 'Yes') {
                $team->delete();
                event(new TeamDeleteEvent($team));
            }
        }
        session()->flash('flash_message_success', 'You successfully deleted the team from this season.');
        return redirect('/myteams/');
    }
}
