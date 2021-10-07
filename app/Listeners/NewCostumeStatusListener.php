<?php

namespace App\Listeners;

use App\Mail\User\CostumeStatusEmail;
use App\Notifications\User\NewCostumeStatusNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NewCostumeStatusListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::send($event->user, new NewCostumeStatusNotification($event->title,$event->message));
        Mail::to($event->user->email)->send(new CostumeStatusEmail($event->user->profile->name,$event->title,$event->message));
    }
}
