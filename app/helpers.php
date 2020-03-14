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

if (! function_exists('sco_parsing')) {
    function sco_parsing(?string $value = null, bool $inline = null)
    {
        /**
        * @var Parsedown $parser
        */
        $parser = app('parsedown');

        if (!func_num_args()) {
            return $parser;
        }

        $parser->setMarkupEscaped(false);
        $parser->setSafeMode(false);

        if (is_null($inline)) {
            $inline = config('parsedown.inline');
        }

        if ($inline) {
            return $parser->line($value);
        }

        return $parser->text($value);
    }
}
