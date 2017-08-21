<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\LogEntry;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index()
    {
        $teams = [
        'P' => [
          'pending' => Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 0], ['car','=',1]])->get(),
          'waitinglist' => Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 1], ['car','=',1]])->get(),
          'confirmed' => Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 2], ['car','=',1]])->get(),
        ],
        'GT' => [
          'pending' => Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 0]])->whereIn('car', [2,3])->get(),
          'waitinglist' => Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 1]])->whereIn('car', [2,3])->get(),
          'confirmed' => Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 2]])->whereIn('car', [2,3])->get(),
        ],
        'GTC' => [
          'pending' => Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 0]])->whereIn('car', [4])->get(),
          'waitinglist' => Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 1]])->whereIn('car', [4])->get(),
          'confirmed' => Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 2]])->whereIn('car', [4])->get(),
        ],
      ];
        $log = LogEntry::with('user')->orderBy('created_at', 'desc')->get();
        //dd($log);
        return view('admin.index', compact('teams', 'log'));
    }
    public function managerIndex()
    {
        $users = User::all();
        return view('admin.manager.index', compact('users'));
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
        }
        $log = $log->with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.log.index', compact('log'));
    }
}
