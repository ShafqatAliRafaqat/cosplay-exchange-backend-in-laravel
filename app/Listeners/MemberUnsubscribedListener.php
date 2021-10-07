<?php

namespace App\Listeners;

use App\Mail\MemberUnsubscribedEmail;
use App\Notifications\Admin\MemberUnsubscribed;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class MemberUnsubscribedListener
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
            Notification::send($admin ,new MemberUnsubscribed());
        }
        Mail::to($event->user->email)->send(new MemberUnsubscribedEmail($event->user->profile->name));
    }
}
