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
          ->where('season_id', '<>', config('constants.current_season'))
          ->get();
        $teams_old2 = $driver
            ->teams()
            ->withTrashed()
            ->where([['season_id', '=', config('constants.current_season')],['deleted_at','<>', null]])
            ->get();
        $teams_old->concat($teams_old2);
        $team_current = $driver->teams()->where('season_id', '=', config('constants.current_season'))->first();
        return view('driver.show', compact('driver', 'teams_old', 'team_current'));
    }
    public function index()
    {
        $drivers = Driver::all();
        return view('driver.index', compact('drivers'));
    }
}
