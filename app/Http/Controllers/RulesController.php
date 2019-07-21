<?php

namespace App\Http\Controllers;

use App\Round;

use Illuminate\Http\Request;

class RulesController extends Controller
{
    //
    public function index(){
      $rounds = Round::where('season_id',config('constants.current_season'))->get();

      return view('rules.show', compact('rounds'));
    }
}
