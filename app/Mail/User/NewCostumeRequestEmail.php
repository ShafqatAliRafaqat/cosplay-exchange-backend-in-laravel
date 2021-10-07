<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCostumeRequestEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $name,$title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$title)
    {
        $this->name=$name;
        $this->title=$title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Costume Request')
                    ->markdown('emails.user.costume-request')
                    ->with('name',$this->name,'title',$this->title);
    }
}
