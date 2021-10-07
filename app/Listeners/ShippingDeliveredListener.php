<?php

namespace App\Listeners;

use App\Notifications\Admin\CostumeDelivered;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ShippingDeliveredListener
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
            Notification::send($admins,new CostumeDelivered($event->title));
            Mail::to($admins->email)->send(new \App\Mail\Admin\CostumeDelivered($event->title));
        }
    }
}
