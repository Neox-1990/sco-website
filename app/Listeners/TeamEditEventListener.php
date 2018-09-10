<?php

namespace App\Listeners;

use App\Driver;
use App\LogEntry;
use App\Events\TeamEditEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeamEditEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TeamEditEvent  $event
     * @return void
     */
    public function handle(TeamEditEvent $event)
    {
        $driverids = [];
        foreach ($event->team->drivers()->get() as $driver) {
            array_push($driverids, $driver->id);
        }

        $driverids = array_map(function ($id) {
            $driver = Driver::where('id', $id)->first();
            return '<a href="'.'/admin/drivers/'.$id.'" title="'.$driver->name.'">'.$id.'</a>';
        }, $driverids);

        $action = $event->title.'. Teamname: '.$event->team->name.
      ' | Teamnumber: '.$event->team->number.
      ' | Teamid: <a href="'.'/admin/teams/'.$event->team->id.'">'.$event->team->id.'</a>'.
      ' | Car: '.config('constants.car_names')[$event->team->car].
      ' | Drivers (ids): '.implode(',', $driverids);

        if (!is_null($event->specialString)) {
            $action .= ' | '.$event->specialString;
        }

        $logentry = new LogEntry;
        $logentry->user_id = auth()->id();
        $logentry->title = $event->title;
        $logentry->action = $action;
        $logentry->save();
    }
}
