<?php

//namespace App;
use App\Setting;

if (! function_exists('sco_setting')) {
    function sco_setting(String $key) : Setting
    {
        $setting = Setting::where('key', $key)->get();
        return $setting->count() == 1 ? $setting->first() : null;
    }
}
