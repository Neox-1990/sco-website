<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Round;
use App\Invite;
use App\Result;
use App\Season;
use App\LogEntry;
use App\Setting;
use App\Driver;
use App\Events\TeamDeleteEvent;
use App\ResultHelper\GridResult;
use App\Events\TeamEditEvent;
use App\Events\UserUpdateEvent;
use App\Events\TeamStatusChangeEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $teams = Team::getSortedTeams();
        $log = LogEntry::with('user')->orderBy('created_at', 'desc')->take(25)->get();
        //dd($log);
        return view('admin.index', compact('teams', 'log'));
    }

    public function managerIndex()
    {
        $users = User::all();
        return view('admin.manager.index', compact('users'));
    }

    public function managerEdit(User $user)
    {
        return view('admin.manager.edit', compact('user'));
    }

    public function managerUpdate(Request $request, User $user)
    {
        $this->validate($request, [
        'manager_email' => 'email|unique:users,email',
      ]);

        if ($request->has('managerNameChange')) {
            $user->name = $request->input('manager_name');
            $user->save();
            session()->flash('flash_message_success', 'Manager name changed.');
            event(new UserUpdateEvent($user, 'Name changed'));
            return redirect('admin/manager/'.$user->id);
        } elseif ($request->has('managerEmailChange')) {
            $user->email = $request->input('manager_email');
            $user->save();
            session()->flash('flash_message_success', 'Manager email changed.');
            event(new UserUpdateEvent($user, 'Email changed'));
            return redirect('admin/manager/'.$user->id);
        } elseif ($request->has('managerSetPass')) {
            $user->password = Hash::make($request->input('manager_pass'));
            $user->save();
            session()->flash('flash_message_success', 'Manager password changed.');
            event(new UserUpdateEvent($user, 'Password changed'));
            return redirect('admin/manager/'.$user->id);
        } else {
            session()->flash('flash_message_alert', 'Unknown error.');
            return redirect('admin/manager/'.$user->id);
        }
    }

    public function logIndex(Request $request)
    {
        $log = LogEntry::query();
        if ($request->has('team_id')) {
            $log->where('action', 'like', '%Teamid: '.$request->input('teamID').'%');
        } elseif ($request->has('manager_id')) {
            $log->where('user_id', '=', $request->input('managerID'));
        } elseif ($request->has('action_')) {
            if ($request->has('filteraction.signup')) {
                $log->orWhere('title', 'like', '%signed up%');
            }
            if ($request->has('filteraction.teamcreated')) {
                $log->orWhere('title', 'like', '%team created%');
            }
            if ($request->has('filteraction.teamdeleted')) {
                $log->orWhere('title', 'like', '%Team deleted%');
            }
            if ($request->has('filteraction.teamdata')) {
                $log->orWhere('title', 'like', '%data updated%');
            }
            if ($request->has('filteraction.driveradd')) {
                $log->orWhere('title', 'like', '%driver added%');
            }
            if ($request->has('filteraction.driverremove')) {
                $log->orWhere('title', 'like', '%driver removed%');
            }
            if ($request->has('filteraction.statusset')) {
                $log->orWhere('title', 'like', '%Status set%');
            }
            if ($request->has('filteraction.carchange')) {
                $log->orWhere('title', 'like', '%car class changed%');
            }
        }
        $log = $log->with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.log.index', compact('log'));
    }

    public function teamIndex()
    {
        $teams = Team::getSortedTeams();
        $deletedTeams = Team::onlyTrashed()->where([['season_id','=',config('constants.current_season')]])->get();
        //dd($deletedTeams);
        return view('admin.team.index', compact('teams', 'deletedTeams'));
    }

    public function teamList()
    {
        $teams = Team::getConfirmedTeams();
        //dd($teams);
        return view('admin.team.list', compact('teams'));
    }
    public function teamUpdate(Request $request, Team $team)
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
            $team->car = $request->input('teamcar');
            $team->ir_teamid = $request->input('teamiracingid');
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
        } else {
            session()->flash('flash_message_alert', 'Unknown Error');
            return redirect('admin/teams/');
        }
    }

    public function teamDelete(Team $team)
    {
        if ($team->delete()) {
            session()->flash('flash_message_success', 'Team #'.$team->number.' '.$team->name.' (id:'.$team->id.') deleted');
            event(new TeamDeleteEvent($team));
        } else {
            session()->flash('flash_message_success', 'An error occurred');
        }
        return redirect('admin/teams/');
    }

    public function teamRestore(Team $team)
    {
        if ($team->restore()) {
            session()->flash('flash_message_success', 'Team #'.$team->number.' '.$team->name.' (id:'.$team->id.') restored');
            event(new TeamEditEvent($team, 'Team restored'));
        } else {
            session()->flash('flash_message_success', 'An error occurred');
        }
        return redirect('admin/teams/');
    }

    public function settingsEdit()
    {
        $settings = Setting::all();
        $setup = [];
        foreach ($settings as $setting) {
            $setup[$setting['key']] = $setting['value'];
        }
        return view('admin.settings.edit', compact('setup'));
    }
    public function settingsUpdate(Request $request)
    {
        $this->validate($request, [
        'confirmed_carchange' => 'nullable|string|regex:/[\d]{4}-[\d]{2}-[\d]{2}T[\d]{2}:[\d]{2}(:[\d]{2})?/',
      ]);
        if ($request->has('simpleSubmit')) {
            foreach ($request->except(['_token','simpleSubmit']) as $key => $value) {
                $setting = Setting::where('key', '=', $key)->first();
                $setting->value = $value;
                $setting->save();
            }
            session()->flash('flash_message_success', 'Settings adjusted');
            return redirect('admin/settings/');
        } else {
            session()->flash('flash_message_alert', 'Unknown Error');
            return redirect('admin/settings/');
        }
    }
    public function teamEdit(Team $team)
    {
        $drivers = $team->drivers()->get();
        $cars = config('constants.car_names');
        return view('admin.team.edit', compact('team', 'cars', 'drivers'));
    }

    public function driverIndex()
    {
        $drivers = Driver::whereHas('teams', function ($query) {
            $query->where('season_id', '=', config('constants.current_season'));
        })->get();
        return view('admin.drivers.index', compact('drivers'));
    }

    public function driverIndexAll()
    {
        $drivers = Driver::all();
        return view('admin.drivers.index', compact('drivers'));
    }

    public function driverEdit(Driver $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    public function driverUpdate(Request $request, Driver $driver)
    {
        $driver->name = $request->input('drivername');
        $driver->iracing_id = $request->input('driveririd');
        $driver->irating = $request->input('driverirating');
        $driver->safetyrating = $request->input('driversafetyrating');
        $driver->save();
        session()->flash('flash_message_success', 'Data of '.$driver->name.' updated');
        return redirect('admin/drivers/'.$driver['id']);
    }

    public function showEmails()
    {
        $manager = User::whereHas('teams', function ($query) {
            $query->where([['status', '=', '4'],['season_id', '=', config('constants.current_season')]]);
        })->pluck('email');
        return $manager->implode(', ');
    }

    public function resultIndex()
    {
        $rounds = Round::where('season_id', '=', config('constants.current_season'))->get();
        //dd($rounds);
        return view('admin.results.index', compact('rounds'));
    }

    public function resultCreate(Round $round)
    {
        //dd($round);
        return view('admin.results.create', compact('round'));
    }

    public function resultStore(Request $request, Round $round)
    {
        if ($request->has('csvresult')) {
            $path = $request->file('result_csv')->storeAs('results', 'result_round_'.$round->id.'.csv');
            $file = Storage::get($path);
            $raw = array_slice(explode("\n", str_replace('"', '', $file)), 4);
            foreach ($raw as $key => $value) {
                $raw[$key] = explode(',', $value);
            }
            $reducedRaw = array();
            $lastP = 0;
            foreach ($raw as $value) {
                if (intval($value[0]) != $lastP) {
                    $reducedRaw[] = $value;
                    $lastP = intval($value[0]);
                }
            }
            $reducedRaw = array_slice($reducedRaw, 0, -1);
            $grid = new GridResult();
            $grid->createFromArray($reducedRaw);
            $grid->sortByClass();
            //dd($grid);
            $teams = Team::getConfirmedTeams(true);

            return view('admin.results.store1', compact('grid', 'round', 'teams'));
        } elseif ($request->has('editedResults')) {
            foreach (config('constants.classes')[config('constants.current_season')] as $class => $cars) {
                for ($i=0; $i < sizeof($request->request->all()[$class]['number']); $i++) {
                    $classList = $request->request->all()[$class];
                    if ($classList['team'][$i] != 0) {
                        $newResult = new Result;
                        $newResult->position = $classList['number'][$i];
                        $newResult->laps = $classList['laps'][$i];
                        $newResult->incs = $classList['incs'][$i];
                        $newResult->finish_status = $classList['finish'][$i];
                        $newResult->team_id = $classList['team'][$i];
                        $newResult->season_id = config('constants.current_season');
                        $newResult->round_id = $round->id;
                        if ($classList['finish'][$i] != 29) {
                            $newResult->points = config('constants.points')[$classList['number'][$i]];
                        } else {
                            $newResult->points = 0;
                        }
                        $newResult->save();
                    }
                }
            }
            dd($request->request->all());
        }
    }

    public function seasonIndex()
    {
        $seasons = Season::get();
        return view('admin.seasons.index', compact('seasons'));
    }
    public function seasonEdit(Season $season)
    {
        $rounds = Round::where('season_id', $season->id)->get()->sortBy('number');
        return view('admin.seasons.edit', compact('season', 'rounds'));
    }
    public function seasonUpdate(Request $request, Season $season)
    {
        $season->name = $request->input('season_name');
        $season->start = $request->input('season_start');
        $season->end = $request->input('season_end');
        if ($season->save()) {
            session()->flash('flash_message_success', 'Season updated');
            return redirect('admin/season/edit/'.$season->id);
        } else {
            session()->flash('flash_message_alert', 'Season update failed');
            return redirect('admin/season/edit/'.$season->id);
        }
    }
    public function seasonCreate()
    {
        return view('admin.seasons.create');
    }
    public function seasonStore(Request $request)
    {
        $season = new Season;
        $season->name = $request->input('season_name');
        $season->start = $request->input('season_start');
        $season->end = $request->input('season_end');
        if ($season->save()) {
            session()->flash('flash_message_success', 'Season updated');
            return redirect('admin/season/');
        } else {
            session()->flash('flash_message_alert', 'Season update failed');
            return redirect('admin/season/');
        }
    }
    public function roundEdit(Season $season, Round $round)
    {
        return view('admin.seasons.editRound', compact('season', 'round'));
    }

    public function roundUpdate(Request $request, Season $season, Round $round)
    {
        $round->number = $request->input('round_number');
        $round->combo = implode('#', [
        $request->input('round_name'),
        $request->input('round_track'),
        $request->input('round_time')
      ]);
        $round->fp1_start = $request->input('round_fp1_start');
        $round->fp1_minutes = $request->input('round_fp1_min');
        $round->fp2_start = $request->input('round_fp2_start');
        $round->fp2_minutes = $request->input('round_fp2_min');
        $round->fp3_start = $request->input('round_fp3_start');
        $round->fp3_minutes = $request->input('round_fp3_min');
        $round->warmup_start = $request->input('round_warmup_start');
        $round->warmup_minutes = $request->input('round_warmup_min');
        $round->qual_start = $request->input('round_qual_start');
        $round->qual_minutes = $request->input('round_qual_min');
        $round->race_start = $request->input('round_race_start');
        $round->race_minutes = empty($request->input('round_race_min'))?null:$request->input('round_race_min');
        $round->race_laps = empty($request->input('round_race_laps'))?null:$request->input('round_race_laps');

        if ($round->save()) {
            session()->flash('flash_message_success', 'Round updated');
            return redirect('admin/season/edit/'.$season->id);
        } else {
            session()->flash('flash_message_alert', 'Round update failed');
            return redirect('admin/season/edit/'.$season->id.'/editRound/'.$round->id);
        }
    }

    public function roundCreate(Season $season)
    {
        return view('admin.seasons.createRound', compact('season'));
    }

    public function roundStore(Request $request, Season $season)
    {
        $round = new Round;
        $round->season_id = $season->id;
        $round->number = $request->input('round_number');
        $round->combo = implode('#', [
      $request->input('round_name'),
      $request->input('round_track'),
      $request->input('round_time')
    ]);
        $round->fp1_start = $request->input('round_fp1_start');
        $round->fp1_minutes = $request->input('round_fp1_min');
        $round->fp2_start = $request->input('round_fp2_start');
        $round->fp2_minutes = $request->input('round_fp2_min');
        $round->fp3_start = $request->input('round_fp3_start');
        $round->fp3_minutes = $request->input('round_fp3_min');
        $round->warmup_start = $request->input('round_warmup_start');
        $round->warmup_minutes = $request->input('round_warmup_min');
        $round->qual_start = $request->input('round_qual_start');
        $round->qual_minutes = $request->input('round_qual_min');
        $round->race_start = $request->input('round_race_start');
        $round->race_minutes = empty($request->input('round_race_min'))?null:$request->input('round_race_min');
        $round->race_laps = empty($request->input('round_race_laps'))?null:$request->input('round_race_laps');

        if ($round->save()) {
            session()->flash('flash_message_success', 'Round created');
            return redirect('admin/season/edit/'.$season->id);
        } else {
            session()->flash('flash_message_alert', 'Round creation failed');
            return redirect('admin/season/edit/'.$season->id);
        }
    }

    public function invitesIndex()
    {
        $managers = User::get();
        $open_invites = Invite::where([['season_id', config('constants.current_season')],['used', null]])->with('user')->get();
        $used_invites = Invite::where([['season_id', config('constants.current_season')],['used', '<>', null]])->with('user')->get();

        //dd($managers, $open_invites, $used_invites);
        return view('admin.invites.index', compact('managers', 'open_invites', 'used_invites'));
    }
    public function invitesProcess(Request $request)
    {
        if ($request->has('add')) {
            $invite = new Invite;
            $invite->season_id = config('constants.current_season');
            $invite->user_id = $request->input('inviteManager');
            if ($invite->save()) {
                session()->flash('flash_message_success', 'Invite added');
                return redirect('admin/invites');
            } else {
                session()->flash('flash_message_alert', 'Invite failed');
                return redirect('admin/invites');
            }
        }

        if ($request->has('delete_invite')) {
            $invite = Invite::where('id', $request->input('id'))->delete();
            session()->flash('flash_message_success', 'Invite deleted');
            return redirect('admin/invites');
        }
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
