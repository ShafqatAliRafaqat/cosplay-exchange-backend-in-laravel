<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CostumeRequestStatus extends Notification
{
    use Queueable;
    public $title,$message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($title,$message)
    {
        $this->title=$title;
        $this->message=$message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'notification'=>'Your request for Costume: '.$this->title.' has been '.$this->message.' '
        ];
    }
}
