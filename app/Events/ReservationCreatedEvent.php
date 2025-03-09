<?php

namespace App\Events;

use App\User;
use App\Reservation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReservationCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reserv;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Reservation $reserv,$user)
    {
        $this->reserv = $reserv;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
