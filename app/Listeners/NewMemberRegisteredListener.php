<?php

namespace App\Listeners;

use App\Mail\WelcomeMemberEmail;
use App\Notifications\Admin\NewMemberRegistered;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NewMemberRegisteredListener
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
            Notification::send($admin ,new NewMemberRegistered());
        }
        Mail::to($event->user->email)->send(new WelcomeMemberEmail());
    }
}
