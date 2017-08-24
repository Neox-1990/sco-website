<?php

namespace App\Listeners;

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

        $action = $event->title.'. Teamname: '.$event->team->name.
      ' | Teamid: '.$event->team->id.
      ' | Teamnumber: '.$event->team->number.
      ' | iRacing Team ID: '.$event->team->ir_teamid.
      ' | Car: '.config('constants.car_names')[$event->team->car].
      ' | Drivers (ids): '.implode(',', $driverids);

        $logentry = new LogEntry;
        $logentry->user_id = auth()->id();
        $logentry->title = $event->title;
        $logentry->action = $action;
        $logentry->save();
    }
}
