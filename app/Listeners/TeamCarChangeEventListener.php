<?php

namespace App\Listeners;

use App\LogEntry;
use App\Events\TeamCarChangeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeamCarChangeEventListener
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
     * @param  TeamCarChangeEvent  $event
     * @return void
     */
    public function handle(TeamCarChangeEvent $event)
    {
        $driverids = [];
        foreach ($event->team->drivers()->get() as $driver) {
            array_push($driverids, $driver->id);
        }

        $action = 'Team car class changed. Teamname: '.$event->team->name.
    ' | Teamid: '.$event->team->id.
    ' | Teamnumber: '.$event->team->number.
    ' | iRacing Team ID: '.$event->team->ir_teamid.
    ' | Car: '.config('constants.car_names')[$event->team->car].
    ' | Drivers (ids): '.implode(',', $driverids);

        $logentry = new LogEntry;
        $logentry->user_id = auth()->id();
        $logentry->title = 'Team car class changed';
        $logentry->action = $action;
        $logentry->save();
    }
}
