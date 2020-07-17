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
        if ($round->season_id != config('constants.current_season')) {
            return redirect('/season/');
        }

        $all = Round::where('season_id', config('constants.current_season'))->orderBy('number')->get();
        $title = explode('#', $round->combo);
        $title[1] = explode(' - ', $title[1]);
        $times = [
          'fp1' => is_null($round->fp1_start)?null:new Carbon($round->fp1_start),
          'fp2' => is_null($round->fp2_start)?null:new Carbon($round->fp2_start),
          'fp3' => is_null($round->fp3_start)?null:new Carbon($round->fp3_start),
          'wup' => new Carbon($round->warmup_start),
          'q' => new Carbon($round->qual_start),
          'r' => new Carbon($round->race_start),
          'fp1_i' => is_null($round->fp1_insimdate)?null:new Carbon($round->fp1_insimdate),
          'fp2_i' => is_null($round->fp2_insimdate)?null:new Carbon($round->fp2_insimdate),
          'fp3_i' => is_null($round->fp3_insimdate)?null:new Carbon($round->fp3_insimdate),
          'wup_i' => is_null($round->warmup_insimdate)?null:new Carbon($round->warmup_insimdate),
          'q_i' => is_null($round->qual_insimdate)?null:new Carbon($round->qual_insimdate),
          'r_i' => is_null($round->race_insimdate)?null:new Carbon($round->race_insimdate),
        ];
        $season = Season::where('id', config('constants.current_season'))->first();
        return view('rounds.show', compact('round', 'all', 'title', 'times', 'season'));
    }
}
