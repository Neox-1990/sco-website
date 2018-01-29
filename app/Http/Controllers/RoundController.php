<?php

namespace App\Http\Controllers;

use App\Round;
use App\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function show(Round $round)
    {
        //dd($round);
        $all = Round::where('season_id', config('constants.curent_season'))->get();
        $title = explode('#', $round->combo);
        $title[1] = explode(' - ', $title[1]);
        $times = [
          'fp1' => is_null($round->fp1_start)?null:new Carbon($round->fp1_start),
          'fp2' => is_null($round->fp2_start)?null:new Carbon($round->fp2_start),
          'fp3' => is_null($round->fp3_start)?null:new Carbon($round->fp3_start),
          'wup' => new Carbon($round->warmup_start),
          'q' => new Carbon($round->qual_start),
          'r' => new Carbon($round->race_start),
        ];
        $season = Season::where('id', config('constants.curent_season'))->first();
        return view('rounds.show', compact('round', 'all', 'title', 'times', 'season'));
    }
}
