<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    //
    public function search(Request $request)
    {
        $this->validate($request, [
          'searchinput' => 'required|max:255|min:3'
        ], [
          'searchinput.required' => 'Please enter a name or iRacing ID into the searchfield.',
          'searchinput.max' => 'Please enter 255 characters maximum to be searched.',
          'searchinput.min' => 'Please enter 3 characters minimum to be searched.'
        ]);
        $search = $request->input('searchinput');
        $drivers;
        if (is_numeric($search)) {
            $drivers = Driver::where('iracing_id', '=', intval($search))
            ->with('teams')
            ->get();
        } else {
            $searchterms = explode(' ', preg_replace('!\s+!', ' ', $search));
            $drivers = Driver::query();
            foreach ($searchterms as $term) {
                $drivers->orWhere('name', 'LIKE', '%'.$term.'%');
            }
            $drivers = $drivers->with('teams')->get();
        }
        return view('driver.searchresult', compact('drivers', 'search'));
    }

    public function show(Driver $driver)
    {
        $teams_old = $driver
          ->teams()
          ->withTrashed()
          ->whereNotNull('deleted_at')
          ->orWhere('season_id', '<>', config('constants.curent_season'))
          ->distinct()
          ->get();

        $team_current = $driver->teams()->where('season_id', '=', config('constants.curent_season'))->first();
        return view('driver.show', compact('driver', 'teams_old', 'team_current'));
    }
}
