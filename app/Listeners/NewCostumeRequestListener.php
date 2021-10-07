<?php

namespace App\Listeners;

use App\Mail\User\NewCostumeRequestEmail;
use App\Notifications\User\NewCostumeRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Nexmo\Laravel\Facade\Nexmo;

class NewCostumeRequestListener
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

        Notification::send($event->user, new NewCostumeRequest($event->title));
        Mail::to($event->user->email)->send(new NewCostumeRequestEmail($event->user->profile->name,$event->title));
        Nexmo::message()->send([
                'to'   => $event->user->profile->phone_no,
                'from' => env('NEXMO_NUMBER'),
                'text' => 'Hi there, You have received a new request for your costume: '.$event->title.'!. Kindly accept it and ship within 48hrs.'
            ]);
    }
}
