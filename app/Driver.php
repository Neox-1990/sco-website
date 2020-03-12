<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public static function updateDriverData($activeOnly = true)
    {
        if ($activeOnly) {
            $drivers = Driver::whereHas('teams', function ($query) {
                $query->where('season_id', '=', config('constants.current_season'));
            })->get();
        } else {
            $drivers = Driver::all();
        }

        $driverpack = [];
        foreach ($drivers as $key => $driver) {
            if ($key % 5 === 0 && $key !== 0) {
                //do the checkingstuff
                $driverIds = array_map(function ($d) {
                    return $d->iracing_id;
                }, $driverpack);

                $ch = curl_init("https://irt.rnld.io/road/?irt_key=".(config('services.irtracker')['token'])."&action=multi&filter=&id=".\implode(',', $driverIds));

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $data = json_decode(curl_exec($ch), true);
                curl_close($ch);

                foreach ($driverpack as $packdriver) {
                    isset($data[$packdriver->iracing_id]['location']) ? $packdriver->setLocation($data[$packdriver->iracing_id]['location']) : $packdriver->setLocation(null);
                    isset($data[$packdriver->iracing_id]['irating']) ? $packdriver->irating = $data[$packdriver->iracing_id]['irating'] : null;
                    isset($data[$packdriver->iracing_id]['safetyrating']) ? $packdriver->safetyrating = \str_replace(' ', '@', $data[$packdriver->iracing_id]['safetyrating']) : null;
                    $packdriver->save();
                }

                $driverpack = [];
            }
            array_push($driverpack, $driver);
        }

        if (!empty($driverpack)) {
            //do the checkingstuff
            $driverIds = array_map(function ($d) {
                return $d->iracing_id;
            }, $driverpack);

            $ch = curl_init("http://irt.rnld.io/road/?irt_key=".(config('services.irtracker')['token'])."&action=multi&filter=&id=".\implode(',', $driverIds));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = json_decode(curl_exec($ch), true);
            curl_close($ch);

            foreach ($driverpack as $packdriver) {
                isset($data[$packdriver->iracing_id]['location']) ? $packdriver->setLocation($data[$packdriver->iracing_id]['location']) : $packdriver->setLocation(null);
                isset($data[$packdriver->iracing_id]['irating']) ? $packdriver->irating = $data[$packdriver->iracing_id]['irating'] : null;
                isset($data[$packdriver->iracing_id]['safetyrating']) ? $packdriver->safetyrating = \str_replace(' ', '@', $data[$packdriver->iracing_id]['safetyrating']) : null;
                $packdriver->save();
            }

            $driverpack = [];
        }

        dd($drivers);
    }

    public function setLocation($locationcode, bool $force = false)
    {
        if ($this->overwrite_location === 0 || $force) {
            $this->location = $locationcode;
            $this->save();
        }
    }

    public static function createFromIRacingID(int $irid)
    {
        $ch = curl_init("https://irt.rnld.io/road/?irt_key=".(config('services.irtracker')['token'])."&action=single&filter=&id=".$irid);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $driver = false;

        if (!empty($data)) {
            $driver = new Driver;
            $driver->name = $data['driver'];
            $driver->iracing_id = $data['id'];
            $driver->safetyrating = \str_replace(' ', '@', $data['safetyrating']);
            $driver->irating = $data['irating'];
            $driver->location = $data['location'];
        }

        return $driver;
    }

    public function updateMe()
    {
        $irid = $this->iracing_id;

        $ch = curl_init("https://irt.rnld.io/road/?irt_key=".(config('services.irtracker')['token'])."&action=single&filter=&id=".$irid);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $this->name = $data['driver'];
        $this->safetyrating = \str_replace(' ', '@', $data['safetyrating']);
        $this->irating = $data['irating'];
        if (!$this->overwrite_location) {
            $this->location = $data['location'];
        }

        return $this->save();
    }
}
