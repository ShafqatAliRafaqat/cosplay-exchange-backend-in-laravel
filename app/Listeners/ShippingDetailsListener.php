<?php

namespace App\Listeners;

use App\Mail\User\ShippingDetailsEmail;
use App\Notifications\Admin\ShipmentAdded;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ShippingDetailsListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        foreach (User::where('role_id','<',4)->get() as $admins)
        {
            Notification::send($admins,new ShipmentAdded());
        }
        Notification::send($event->user, new \App\Notifications\User\ShipmentAdded($event->title));
        Mail::to($event->user)->send(new ShippingDetailsEmail($event->user->profile->name,$event->title,$event->shipping));

    }
}
