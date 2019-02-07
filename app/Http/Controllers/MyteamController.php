<?php

namespace App\Http\Controllers;

use App\Team;
use App\Round;
use App\Invite;
use App\Season;
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
        $season = Season::where('id', config('constants.current_season'))->first();
        $teams = Team::with('drivers')
          ->where('user_id', $user->id)
          ->where('season_id', config('constants.current_season'))
          ->get();
        return view('myteams.index', compact('teams', 'season'));
    }
    public function create()
    {
        $setting = Setting::getSetup();
        if (boolval($setting['freeze_teams'])) {
            session()->flash('flash_message_alert', 'Teams are frozen right now. You can\'t add teams.');
            return redirect('/myteams/');
        }
        $has_invite = Invite::where([['user_id','=', auth()->user()->id],['season_id', '=', config('constants.current_season')],['used', '=', null]])->count() > 0;
        $numbers = Team::getClassNumbers();
        $min_ir = max(config('constants.ir_limits'));
        $former_teams = Team::where([['user_id', auth()->user()->id],['season_id', '<>', config('constants.current_season')]])->with('season')->get();
        //dd($former_teams);
        return view('myteams.create', compact('has_invite', 'numbers', 'min_ir', 'former_teams'));
    }
    public function store(CreateTeam $request)
    {
        $setting = Setting::getSetup();
        if (boolval($setting['freeze_teams'])) {
            session()->flash('flash_message_alert', 'Teams are frozen right now. You can\'t add teams.');
            return redirect('/myteams/');
        }
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
        $setting = Setting::getSetup();
        if (boolval($setting['freeze_teams'])) {
            session()->flash('flash_message_alert', 'Teams are frozen right now. You can\'t edit teams.');
            return redirect('/myteams/');
        }
        $legit = false;
        if ($team->user()->first()->id == auth()->id() && $team->season()->first()->id == config('constants.current_season')) {
            $legit = true;
        }
        if (!$legit) {
            session()->flash('flash_message_alert', 'An error occured');
        }
        $numbers = Team::getClassNumbers();
        $classcars = Team::getCarToClassArray();
        $carClass = $classcars[$team->car];
        foreach (config('constants.classes')[config('constants.current_season')][$carClass] as $value) {
            $numbers[$value][$team->number] = $team->number;
        }
        $classcars = config('constants.classes')[config('constants.current_season')][$carClass];

        $now = Carbon::now('UTC');
        //$now = new Carbon('2017-10-05 16:59:59', 'UTC');
        $end = (clone($now))->addDays(4)->subHours(2);
        $now->subHours(4);
        $race = Round::whereBetween('race_start', [$now->format('Y-m-d H:i:s'),$end->format('Y-m-d H:i:s')])->get();
        $driverChangeLimit = $team->status != 0 && $race->count()>0;

        $driverLimitReached = $team->drivers()->count() >= 6;

        return view('myteams.edit', compact('legit', 'team', 'numbers', 'deadline', 'classcars', 'driverChangeLimit', 'driverLimitReached'));
    }
    public function update(EditTeam $request, Team $team)
    {
        $setting = Setting::getSetup();
        if (boolval($setting['freeze_teams'])) {
            session()->flash('flash_message_alert', 'Teams are frozen right now. You can\'t edit teams.');
            return redirect('/myteams/');
        }
        $legit = false;
        if ($team->user()->first()->id != auth()->id() || $team->season()->first()->id != config('constants.current_season')) {
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
        $setting = Setting::getSetup();
        if (boolval($setting['freeze_teams'])) {
            session()->flash('flash_message_alert', 'Teams are frozen right now. You can\'t delete teams.');
            return redirect('/myteams/');
        }
        $legit = false;
        if ($team->user()->first()->id == auth()->id()) {
            $legit = true;
        }
        return view('myteams.delete', compact('legit', 'team'));
    }
    public function destroy(Request $request, Team $team)
    {
        $setting = Setting::getSetup();
        if (boolval($setting['freeze_teams'])) {
            session()->flash('flash_message_alert', 'Teams are frozen right now. You can\'t delete teams.');
            return redirect('/myteams/');
        }
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
