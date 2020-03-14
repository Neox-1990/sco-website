<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function edit()
    {
        $settings = Setting::all();
        $setup = [];
        foreach ($settings as $setting) {
            $setup[$setting['key']] = $setting['value'];
        }
        return view('admin.settings.edit', compact('setup', 'settings'));
    }
    
    public function update(Request $request)
    {
        if ($request->has('simpleSubmit')) {
            foreach ($request->except(['_token','simpleSubmit']) as $key => $value) {
                $setting = Setting::where('key', '=', $key)->first();
                $setting->value = $value;
                $setting->save();
            }
            session()->flash('flash_message_success', 'Settings adjusted');
            return redirect('admin/settings/');
        } else {
            session()->flash('flash_message_alert', 'Unknown Error');
            return redirect('admin/settings/');
        }
    }

    public function showEmails()
    {
        $manager = User::whereHas('teams', function ($query) {
            $query->where([['status', '=', '4'],['season_id', '=', config('constants.current_season')]]);
        })->pluck('email');
        return $manager->implode(', ');
    }
}
