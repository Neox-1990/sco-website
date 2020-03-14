<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    //
    public function show()
    {
        return view('admin.tools.show');
    }

    public function pqtoolShow()
    {
        return view('admin.tools.pqshow');
    }

    public function pqtoolProcess(Request $request)
    {
        $raw = $request->input('raw');
        $exploded_raw = explode("\r\n", $raw);
        $time_array = [];
        $drivers = [];
        foreach ($exploded_raw as $i => $row) {
            switch ($i % 4) {
            case 0:
              $lap = explode("\t", $row);
              array_push($time_array, ['lap' => intval($lap[0])]);
              break;

            case 2:
              $lasti = count($time_array) - 1;
              $time_array[$lasti]['name'] = $row;
              if (!in_array($row, $drivers)) {
                  array_push($drivers, $row);
              }
              break;

            case 3:
              $lasti = count($time_array) - 1;
              $time = explode("\t", $row);
              $time_array[$lasti]['time'] = $time[0];
              break;

            default:
              break;
          }
        }

        $time_array = array_filter($time_array, function ($e) {
            return preg_match('/\d\d:\d\d.\d\d\d/', $e['time']) === 1;
        });
        $time_array = array_map(function ($e) {
            $time = explode(":", $e['time']);
            $time = floatval(60 * intval($time[0])) + floatval($time[1]);
            $e['time'] = $time;
            return $e;
        }, $time_array);

        $driver_array = [];

        foreach ($drivers as $driver) {
            $driver_array[$driver] = [];
            $driver_array[$driver]["laps"] = array_filter($time_array, function ($e) use ($driver) {
                return $e['name'] == $driver;
            });
        }

        foreach ($driver_array as $drivername => $darray) {
            //get start index (laps) of runs
            $driver_array[$drivername]['run_starts'] = [];
            foreach ($darray['laps'] as $i => $time) {
                $check = true;
                for ($j=1; $j < 10 ; $j++) {
                    if (!key_exists($i+$j, $darray['laps'])) {
                        $check = false;
                        break;
                    }
                }
                if ($check) {
                    array_push($driver_array[$drivername]['run_starts'], $i);
                }
            }
        }

        foreach ($driver_array as $drivername => $darray) {
            //calculate runtimes
            $driver_array[$drivername]['run_times'] = [];
            foreach ($darray['run_starts'] as $startindex) {
                $time = $darray['laps'][$startindex]['time'];
                for ($i=$startindex+1; $i < $startindex+10; $i++) {
                    $time += $darray['laps'][$i]['time'];
                }
                array_push($driver_array[$drivername]['run_times'], $time);
            }
        }

        foreach ($driver_array as $drivername => $darray) {
            //get fastest runtimes
            if (empty($darray['run_times'])) {
                $driver_array[$drivername]['final_time'] = 0;
            } else {
                $driver_array[$drivername]['final_time'] = min($darray['run_times']);
            }
        }
        return view('admin.tools.pqprocess', compact('driver_array'));
    }
}
