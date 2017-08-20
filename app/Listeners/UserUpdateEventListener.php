<?php

namespace App\Listeners;

use App\LogEntry;
use App\Events\UserUpdateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserUpdateEventListener
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
     * @param  UserUpdateEvent  $event
     * @return void
     */
    public function handle(UserUpdateEvent $event)
    {
        $logEntry = new LogEntry;
        $logEntry->user_id = $event->user->id;
        $logEntry->title = 'Manager data updated.';
        $logEntry->action = 'Manager data updated: '.$event->title.'. Name: '.$event->user->name.' | Email: '.$event->user->email;
        $logEntry->save();
    }
}
