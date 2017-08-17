<?php

namespace App\Http\Controllers;

use App\Round;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $roundId = Round::where([
        ['season_id','=',config('constants.curent_season')],
        ['race_start','>',(new Carbon())->subDays(1)->toDateTimeString()]
      ])->orderBy('race_start', 'asc')
        ->first()
        ->id;

        return redirect(url('/rounds/'.$roundId));
    }
}
