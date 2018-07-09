<?php

namespace App\Http\Controllers;

use App\Team;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //

    public function formerTeams(Request $request, Team $team)
    {
        $drivers = $team->drivers()->get();
        return $drivers;
    }
}
