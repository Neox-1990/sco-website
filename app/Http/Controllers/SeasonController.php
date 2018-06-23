<?php

namespace App\Http\Controllers;

use App\Team;
use App\Round;
use App\Result;
use App\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeasonController extends Controller
{
    public function index()
    {
        $lastRound = Round::where([
        ['season_id','=',config('constants.current_season')],
        ['race_start','>',(new Carbon())->subDays(1)->toDateTimeString()]
      ])->orderBy('race_start', 'asc')
        ->first();

        if (is_null($lastRound)) {
            $roundId = Round::where([
          ['season_id','=',config('constants.current_season')]
        ])->orderBy('race_start', 'desc')
          ->first()
          ->id;
        } else {
            $roundId = $lastRound->id;
        }

        return redirect(url('/rounds/'.$roundId));
    }

    public function archiveIndex()
    {
        $seasons = Season::where([['id', '<>' ,config('constants.current_season')],['start','<',Carbon::now()]])->get();
        return view('archive.index', compact('seasons'));
    }

    public function archiveShow(Season $season)
    {
        //$results = Result::where('season_id', config('constants.current_season'))->get();
        $results = DB::table('results')->select(DB::raw('team_id, SUM(points) as points '))->where('season_id', $season->id)->groupBy('team_id')->get();
        $results = $results->map(function ($array, $key) {
            $array = (array)$array;
            $array['team'] = Team::withTrashed()->where('id', $array['team_id'])->first();
            $array = (object)$array;
            return $array;
        });
        $resultsSorted = array();
        //dd($results);
        foreach (config('constants.classes')[$season->id] as $class => $cars) {
            $resultsSorted[$class] = $results->filter(function ($result, $key) use ($cars) {
                $team = Team::withTrashed()->where('id', $result->team_id)->first();
                return in_array($team->car, $cars);
            });

            /*$resultsSorted[$class] = $resultsSorted[$class]->sortByDesc(function ($result, $key) {
                return $result->points;
            });*/

            $resultsSorted[$class] = $resultsSorted[$class]->sort(function ($a, $b) use ($season) {
                if (floor($a->points) == floor($b->points)) {
                    /*if(floor($a->points) == 0 && $a->points != $b->points){
                      return ($a->points > $b->points) ? -1 : 1;
                    }else{*/
                    $minPos = 0;
                    $abort = false;
                    while (!$abort) {
                        $minA = $a->team->results()->where([['season_id','=',$season->id],['position','>',$minPos]])->min('position');
                        $minB = $b->team->results()->where([['season_id','=',$season->id],['position','>',$minPos]])->min('position');

                        if ($minA === null && $minB === null) {
                            $abort = true;
                            continue;
                        }
                        if ($minA === null && $minB !== null) {
                            return 1;
                        } elseif ($minA ==! null && $minB === null) {
                            return -1;
                        }

                        if ($minA != $minB) {
                            return ($minA < $minB) ? -1 : 1;
                        } else {
                            $countA = $a->team->results()->where([['season_id','=',$season->id],['position','=',$minA]])->count();
                            $countB = $b->team->results()->where([['season_id','=',$season->id],['position','=',$minB]])->count();

                            if ($countA != $countB) {
                                return ($countA > $countB) ? -1 : 1;
                            } else {
                                $minPos = $minA;
                            }
                        }
                    }
                    //}
                    return 0;
                } else {
                    return ($a->points > $b->points) ? -1 : 1;
                }
            });

            $resultsSorted[$class] = $resultsSorted[$class]->values();
        }
        //dd($resultsSorted);
        $teamResults = array();
        $rounds = Round::where('season_id', $season->id)->get();
        $teams = Team::withTrashed()->where('season_id', $season->id)->has('results')->with('results')->get();
        foreach ($teams as $team) {
            $roundresults = [];
            foreach ($rounds as $round) {
                $roundresult = '-';
                if ($team->results->contains('round_id', $round->id)) {
                    $roundresult = floor($team->results->where('round_id', $round->id)->first()->points);
                }
                $roundresults[$round->number] = $roundresult;
            }
            $teamResults[$team->id] = $roundresults;
        }
        $first = array_keys($resultsSorted)[0];
        //dd($resultsSorted);
        return view('archive.showSeason', compact('resultsSorted', 'rounds', 'first', 'teamResults', 'season'));
    }

    public function archiveShowRound(Season $season, Round $round)
    {
        $results = Result::where('round_id', $round->id)->with('team')->get();
        $resultsSorted = array();
        foreach (config('constants.classes')[$season->id] as $class => $cars) {
            $resultsSorted[$class] = $results->filter(function ($result, $key) use ($cars) {
                $team = $result->team;
                return in_array($team->car, $cars);
            });

            $resultsSorted[$class] = $resultsSorted[$class]->sortBy(function ($result, $key) {
                return $result->position;
            });
        }
        $rounds = Round::where('season_id', $season->id)->get();
        $first = array_keys($resultsSorted)[0];
        return view('archive.showSeasonRound', compact('resultsSorted', 'rounds', 'round', 'first', 'season'));
    }
}
