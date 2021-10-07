<?php

namespace App\Listeners;

use App\Mail\MemberSubscribed;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class MemberSubscribedListener
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
        foreach (User::where('role_id','<',4)->get() as $admin){
            Notification::send($admin ,new \App\Notifications\Admin\MemberSubscribed());
        }
        Mail::to($event->user->email)->send(new MemberSubscribed($event->user->profile->name));
    }
}
