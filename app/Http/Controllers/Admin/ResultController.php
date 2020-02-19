<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Round;
use App\Result;
use App\ResultHelper\GridResult;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResultController extends Controller
{
    //
    public function index()
    {
        $rounds = Round::where('season_id', '=', config('constants.current_season'))->get();
        return view('admin.results.index', compact('rounds'));
    }

    public function create(Round $round)
    {
        return view('admin.results.create', compact('round'));
    }

    public function store(Request $request, Round $round)
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
}
