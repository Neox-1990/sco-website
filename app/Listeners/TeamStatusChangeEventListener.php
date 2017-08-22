<?php

namespace App\Listeners;

use App\Events\TeamStatusChangeEvent;
use App\Mail\StatusUpdateMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class TeamStatusChangeEventListener
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
     * @param  TeamStatusChangeEvent  $event
     * @return void
     */
    public function handle(TeamStatusChangeEvent $event)
    {
        Mail::to($event->user->email)->send(new StatusUpdateMail($event->team));
    }
}
