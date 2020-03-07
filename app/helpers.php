<?php

//namespace App;
use App\Setting;

if (! function_exists('sco_setting')) {
    /**
     * @param String $key Keyname
     * @param Boolean $valueOnly get value instead of whole Setting model
     * @param Mixed $default default return value if Setting doesnt exist
     * @return Mixed Setting model, Value of the Setting or default value
     */
    function sco_setting(String $key, $valueOnly = false, $default = null)
    {
        $setting = Setting::where('key', $key)->get();
        if ($setting->count() == 1) {
            if ($valueOnly) {
                return $setting->first()->value;
            } else {
                return $setting->first();
            }
        } else {
            return $default;
        }
    }
}
