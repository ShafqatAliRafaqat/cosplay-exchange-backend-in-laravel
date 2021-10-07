<?php

namespace App\Listeners;

use App\Mail\Admin\NewCostumeMail;
use App\Notifications\Admin\NewCostumeUpload;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NewCostumeListener implements ShouldQueue
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
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        foreach (User::where('role_id', '<', 4)->get() as $admin) {
            Mail::to($admin->email)->send(new NewCostumeMail());
            Notification::send($admin, new NewCostumeUpload());
        }
    }
}
