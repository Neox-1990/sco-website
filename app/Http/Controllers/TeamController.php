<?php

namespace App\Http\Controllers;

use App\Team;
use App\LogEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $teams;
        $classes = config('constants.classes')[config('constants.current_season')];
        foreach ($classes as $classname => $cararray) {
            $teams[$classname]['confirmed'] = Team::where([['season_id','=',config('constants.current_season')],['status','=',4]])
              ->whereIn('car', $cararray)
              ->with(['user'])
              ->orderBy('created_at', 'asc')
              ->get();
            $teams[$classname]['reviewed'] = Team::where([['season_id','=',config('constants.current_season')],['status','=',1]])
              ->whereIn('car', $cararray)
              ->with(['user'])
              ->orderBy('created_at', 'asc')
              ->get();
            $teams[$classname]['waiting'] = Team::where([['season_id','=',config('constants.current_season')],['status','=',2]])
              ->whereIn('car', $cararray)
              ->with(['user'])
              ->orderBy('created_at', 'asc')
              ->get();
            $teams[$classname]['pending'] = Team::where([['season_id','=',config('constants.current_season')],['status','=',0]])
              ->whereIn('car', $cararray)
              ->with(['user'])
              ->orderBy('created_at', 'asc')
              ->get();
            $teams[$classname]['qualified'] = Team::where([['season_id','=',config('constants.current_season')],['status','=',3]])
                ->whereIn('car', $cararray)
                ->with(['user'])
                ->orderBy('created_at', 'asc')
                ->get();

            $teams[$classname]['waiting'] = $teams[$classname]['waiting']->sort(function ($team1, $team2) {
                $date1;
                $date2;
                if (LogEntry::where([['title','like','%car class changed%'],['action','like','%| Teamid: '.$team1['id'].' |%']])->count() != 0) {
                    $date1 = new Carbon((LogEntry::where([['title','like','%car class changed%'],['action','like','%| Teamid: '.$team1['id'].' |%']])->orderBy('created_at', 'desc')->first())['created_at']);
                } else {
                    $date1 = new Carbon($team1['created_at']);
                }
                if (LogEntry::where([['title','like','%car class changed%'],['action','like','%| Teamid: '.$team2['id'].' |%']])->count() != 0) {
                    $date2 = new Carbon((LogEntry::where([['title','like','%car class changed%'],['action','like','%| Teamid: '.$team2['id'].' |%']])->orderBy('created_at', 'desc')->first())['created_at']);
                } else {
                    $date2 = new Carbon($team2['created_at']);
                }
                return ($date1->eq($date2)?0:($date1->lt($date2)?-1:1));
            });
        }
        //dd($teams_backup, $teams);
        return view('teams.index', compact('teams'));
    }

    public function show(Team $team)
    {
        $team = Team::where('id', $team->id)
        ->withTrashed()
        ->with(['user','drivers'])->first();
        $className;
        foreach (config('constants.classes')[$team['season_id']] as $class => $cararray) {
            if (in_array($team->car, $cararray)) {
                $className = $class;
            }
        }
        $season = $team->season;
        return view('teams.show', compact('team', 'className', 'season'));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
        'searchinput' => 'required|max:255|min:3'
      ], [
        'searchinput.required' => 'Please enter a name or iRacing ID into the searchfield.',
        'searchinput.max' => 'Please enter 255 characters maximum to be searched.',
        'searchinput.min' => 'Please enter 3 characters minimum to be searched.'
      ]);
        $search = $request->input('searchinput');
        $teams;
        if (is_numeric($search)) {
            $teams = Team::withTrashed()->where('ir_teamid', '=', intval($search))
              ->with('user')
              ->with('season')
              ->get();
        } else {
            $searchterms = explode(' ', preg_replace('!\s+!', ' ', $search));
            $teams = Team::query();
            $teams->withTrashed();
            foreach ($searchterms as $term) {
                $teams->orWhere('name', 'LIKE', '%'.$term.'%');
            }
            $teams = $teams->with('user')->with('season')->get();
        }
        $currentTeams = clone($teams);
        $oldTeams = clone($teams);

        $currentTeams=$currentTeams->filter(function (Team $team, $key) {
            //dd($team->deleted_at);
            return ($team->season_id == config('constants.current_season') && $team->deleted_at === null);
        });
        $oldTeams=$oldTeams->filter(function (Team $team, $key) {
            return ($team->season_id != config('constants.current_season') || $team->deleted_at !== null);
        });

        return view('teams.searchresult', compact('currentTeams', 'oldTeams', 'search'));
    }

    public function spotterguide($class = null)
    {
        $teamlist = Team::getConfirmedTeams();
        if (array_key_exists($class, $teamlist)) {
            $teamlist = [$class => $teamlist[$class]];
        }
        //dd($class, $teams['P1'][3]->drivers);
        return view('spotterguide.show', compact('teamlist'));
    }
}
