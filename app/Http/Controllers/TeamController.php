<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $teams;
        $classes = config('constants.classes')[config('constants.curent_season')];
        foreach ($classes as $classname => $cararray) {
            $teams[$classname]['confirmed'] = Team::where([['season_id','=',config('constants.curent_season')],['status','=',2]])
              ->whereIn('car', $cararray)
              ->with(['user'])->get();
            $teams[$classname]['waiting'] = Team::where([['season_id','=',config('constants.curent_season')],['status','=',1]])
              ->whereIn('car', $cararray)
              ->with(['user'])->get();
            $teams[$classname]['pending'] = Team::where([['season_id','=',config('constants.curent_season')],['status','=',0]])
              ->whereIn('car', $cararray)
              ->with(['user'])->get();
        }
        //dd($teams);
        return view('teams.index', compact('teams'));
    }

    public function show(Team $team)
    {
        $team = Team::where('id', $team->id)
        ->withTrashed()
        ->with(['user','drivers'])->first();
        $className;
        foreach (config('constants.classes')[config('constants.curent_season')] as $class => $cararray) {
            if (in_array($team->car, $cararray)) {
                $className = $class;
            }
        }
        return view('teams.show', compact('team', 'className'));
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
              ->get();
        } else {
            $searchterms = explode(' ', preg_replace('!\s+!', ' ', $search));
            $teams = Team::query();
            $teams->withTrashed();
            foreach ($searchterms as $term) {
                $teams->orWhere('name', 'LIKE', '%'.$term.'%');
            }
            $teams = $teams->with('user')->get();
        }
        $currentTeams = clone($teams);
        $oldTeams = clone($teams);

        $currentTeams=$currentTeams->filter(function (Team $team, $key) {
            //dd($team->deleted_at);
            return ($team->season_id == config('constants.curent_season') && $team->deleted_at === null);
        });
        $oldTeams=$oldTeams->filter(function (Team $team, $key) {
            return ($team->season_id != config('constants.curent_season') || $team->deleted_at !== null);
        });

        return view('teams.searchresult', compact('currentTeams', 'oldTeams', 'search'));
    }
}
