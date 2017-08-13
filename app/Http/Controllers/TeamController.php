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
}
