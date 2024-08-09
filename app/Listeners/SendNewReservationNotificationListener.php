<?php

namespace App\Listeners;

use App\Events\ReservationCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Sentinel;
use App\Notifications\NewReservationNotification;

class SendNewReservationNotificationListener
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
     * @param  \App\Events\ReservationCreatedEvent  $event
     * @return void
     */
    public function handle(ReservationCreatedEvent $event)
    {
        // $event->user =  Sentinel::getUser();
        $managers = Sentinel::findRoleBySlug('manager');
        $managers  = $managers->users()->get();

        // $event->user->notify(new NewReservationNotification($event->reserv,$event->user));
        Notification::send($managers, new NewReservationNotification($event->reserv, $event->user));
    }
}
