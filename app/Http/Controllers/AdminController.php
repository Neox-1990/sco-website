<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\LogEntry;
use App\Setting;
use App\Events\TeamEditEvent;
use App\Events\UserUpdateEvent;
use App\Events\TeamStatusChangeEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $teams = Team::getSortedTeams();
        $log = LogEntry::with('user')->orderBy('created_at', 'desc')->get();
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
        return view('admin.team.index', compact('teams'));
    }
    public function teamUpdate(Request $request, Team $team)
    {
        if ($request->has('confirm')) {
            $team->status = 2;
            $team->save();
            session()->flash('flash_message_success', 'Status of '.$team->name.' changed to: confirmed');
            event(new TeamStatusChangeEvent($team));
            event(new TeamEditEvent($team, 'Status set confirmed'));
            return redirect('admin/teams/');
        } elseif ($request->has('waiting')) {
            $team->status = 1;
            $team->save();
            session()->flash('flash_message_success', 'Status of '.$team->name.' changed to: waitinglist');
            event(new TeamStatusChangeEvent($team));
            event(new TeamEditEvent($team, 'Status set waitinglist'));
            return redirect('admin/teams/');
        } elseif ($request->has('pending')) {
            $team->status = 0;
            $team->save();
            session()->flash('flash_message_success', 'Status of '.$team->name.' changed to: pending');
            event(new TeamStatusChangeEvent($team));
            event(new TeamEditEvent($team, 'Status set pending'));
            return redirect('admin/teams/');
        } else {
            session()->flash('flash_message_alert', 'Unknown Error');
            return redirect('admin/teams/');
        }
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
}
