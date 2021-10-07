<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCostumeRequestStatusEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $name,$title,$message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$title, $message)
    {
        $this->name=$name;
        $this->title=$title;
        $this->message=$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Costume Request '.$this->message)
                    ->markdown('emails.user.costume-request-status')
                    ->with('name',$this->name,'title',$this->title,'message',$this->message);
    }
}
