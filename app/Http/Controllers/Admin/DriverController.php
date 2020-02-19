<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    //
    public function index()
    {
        $drivers = Driver::whereHas('teams', function ($query) {
            $query->where('season_id', '=', config('constants.current_season'));
        })->get();
        return view('admin.drivers.index', compact('drivers'));
    }

    public function all()
    {
        $drivers = Driver::all();
        return view('admin.drivers.index', compact('drivers'));
    }

    public function edit(Driver $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $driver->name = $request->input('drivername');
        $driver->iracing_id = $request->input('driveririd');
        $driver->irating = $request->input('driverirating');
        $driver->safetyrating = $request->input('driversafetyrating');
        $driver->setLocation(\strtoupper($request->input('driverlocation')), true);
        $driver->overwrite_location = \intval($request->input('driverlocationoverwrite', 0));
        $driver->save();
        session()->flash('flash_message_success', 'Data of '.$driver->name.' updated');
        return redirect('admin/drivers/'.$driver['id']);
    }
}
