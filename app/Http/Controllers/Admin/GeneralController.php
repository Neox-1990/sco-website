<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Driver;
use App\Setting;
use App\LogEntry;
use App\Team;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //
    public function index()
    {
        $teams = Team::getSortedTeams();
        $log = LogEntry::with('user')->orderBy('created_at', 'desc')->take(25)->get();
        return view('admin.index', compact('teams', 'log'));
    }

    public function logIndex(Request $request)
    {
        $log = LogEntry::query();
        if ($request->has('team_id')) {
            $log
              ->where('action', 'like', '%Teamid: '.$request->input('teamID').'%')
              ->orWhere('action', 'like', '%Teamid: <a href="/admin/teams/'.$request->input('teamID').'">'.$request->input('teamID').'</a>%');
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

    public function updateSetting(Request $request, Setting $setting)
    {
        $setting['value'] = $request->input('value');
        return json_encode($setting->save());
    }

    public function updateDriverInfo()
    {
        Driver::updateDriverData();
    }
}
