<?php

namespace App\Http\Controllers;

use App\Round;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $lastRound = Round::where([
        ['season_id','=',config('constants.curent_season')],
        ['race_start','>',(new Carbon())->subDays(1)->toDateTimeString()]
      ])->orderBy('race_start', 'asc')
        ->first();

        if (is_null($lastRound)) {
            $roundId = Round::where([
          ['season_id','=',config('constants.curent_season')]
        ])->orderBy('race_start', 'desc')
          ->first()
          ->id;
        } else {
            $roundId = $lastRound->id;
        }

        return redirect(url('/rounds/'.$roundId));
    }
}
