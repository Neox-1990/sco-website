<?php

namespace App\Http\Controllers;

use App\Team;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formerTeams(Request $request, Team $team)
    {
        $drivers = $team->drivers()->get();
        return $drivers;
    }

    public function iratingTeam(Request $request){
      $ch = curl_init("http://irt.rnld.io/road/?irt_key=".env('IR_TRACKERTOKEN')."&action=multi&filter=&id=".$request->input('ids'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      $data = json_decode(curl_exec($ch), true);
      curl_close($ch);

      return $data;
    }
}
