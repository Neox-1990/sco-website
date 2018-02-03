<?php

namespace App\Listeners;

use App\LogEntry;
use App\Events\TeamDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TeamDeleteEventListener
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
     * @param  TeamDeleteEvent  $event
     * @return void
     */
    public function handle(TeamDeleteEvent $event)
    {
        $driverids = [];
        foreach ($event->team->drivers()->get() as $driver) {
            array_push($driverids, $driver->id);
        }

        $driverids = array_map(function ($id) {
            return '<a href="'.url('/admin/drivers/'.$id).'">'.$id.'</a>';
        }, $driverids);

        $action = 'Team deleted. Teamname: '.$event->team->name.
        ' | Teamid: '.$event->team->id.
        ' | Teamnumber: '.$event->team->number.
        ' | iRacing Team ID: <a href="'.url('/admin/teams/'.$event->team->ir_teamid).'">'.$event->team->ir_teamid.'</a>'.
        ' | Car: '.config('constants.car_names')[$event->team->car].
        ' | Drivers (ids): '.implode(',', $driverids);

        $logentry = new LogEntry;
        $logentry->user_id = auth()->id();
        $logentry->title = 'Team deleted';
        $logentry->action = $action;
        $logentry->save();
    }
}
