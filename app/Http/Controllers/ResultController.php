<?php

namespace App\Http\Controllers;

use App\Team;
use App\Round;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    //
    public function index()
    {
        //$results = Result::where('season_id', config('constants.curent_season'))->get();
        $results = DB::table('results')->select(DB::raw('team_id, SUM(points) as points '))->where('season_id', config('constants.curent_season'))->groupBy('team_id')->get();
        $results = $results->map(function ($array, $key) {
            $array = (array)$array;
            $array['team'] = Team::where('id', $array['team_id'])->first();
            $array = (object)$array;
            return $array;
        });
        $resultsSorted = array();
        foreach (config('constants.classes')[config('constants.curent_season')] as $class => $cars) {
            $resultsSorted[$class] = $results->filter(function ($result, $key) use ($cars) {
                $team = Team::where('id', $result->team_id)->first();
                return in_array($team->car, $cars);
            });

            $resultsSorted[$class] = $resultsSorted[$class]->sortByDesc(function ($result, $key) {
                return floatval($result->points);
            });

            $resultsSorted[$class] = $resultsSorted[$class]->values();
        }

        $rounds = Round::where('season_id', config('constants.curent_season'))->get();
        $first = array_keys($resultsSorted)[0];
        //dd($resultsSorted);
        return view('results.index', compact('resultsSorted', 'rounds', 'first'));
    }

    public function show(Round $round)
    {
        $results = Result::where('round_id', $round->id)->with('team')->get();
        $resultsSorted = array();
        foreach (config('constants.classes')[config('constants.curent_season')] as $class => $cars) {
            $resultsSorted[$class] = $results->filter(function ($result, $key) use ($cars) {
                $team = $result->team;
                return in_array($team->car, $cars);
            });

            $resultsSorted[$class] = $resultsSorted[$class]->sortBy(function ($result, $key) {
                return $result->position;
            });
        }
        $rounds = Round::where('season_id', config('constants.curent_season'))->get();
        $first = array_keys($resultsSorted)[0];
        return view('results.show', compact('resultsSorted', 'rounds', 'round', 'first'));
    }
}
