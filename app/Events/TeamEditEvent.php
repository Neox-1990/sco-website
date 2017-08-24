<?php

namespace App\Events;

use App\Team;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TeamEditEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $team;
    public $title;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(Team $team, $title)
    {
        $this->team = $team;
        $this->title = $title;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
