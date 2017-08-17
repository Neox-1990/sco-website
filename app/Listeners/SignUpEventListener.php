<?php

namespace App\Listeners;

use App\LogEntry;
use App\Events\SignUpEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SignUpEventListener
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
     * @param  SignUpEvent  $event
     * @return void
     */
    public function handle(SignUpEvent $event)
    {
        $logEntry = new LogEntry;
        $logEntry->user_id = $event->user->id;
        $logEntry->title = 'New manager signed up.';
        $logEntry->action = 'A new Manger signed up. Name: '.$event->user->name.' | Email: '.$event->user->email;
        $logEntry->save();
    }
}
