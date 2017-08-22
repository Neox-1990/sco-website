<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SignUpEvent' => [
            'App\Listeners\SignUpEventListener',
        ],
        'App\Events\TeamCreateEvent' => [
            'App\Listeners\TeamCreateEventListener',
        ],
        'App\Events\TeamEditEvent' => [
            'App\Listeners\TeamEditEventListener',
        ],
        'App\Events\TeamDeleteEvent' => [
            'App\Listeners\TeamDeleteEventListener',
        ],
        'App\Events\UserUpdateEvent' => [
            'App\Listeners\UserUpdateEventListener',
        ],
        'App\Events\TeamStatusChangeEvent' => [
            'App\Listeners\TeamStatusChangeEventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
