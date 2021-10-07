<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShippingDetailsEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $name,$title,$shipping;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$title,$shipping)
    {
        $this->name=$name;
        $this->title=$title;
        $this->shipping=$shipping;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Costume Shipped')
                    ->markdown('emails.user.costume-shipping-details')
                    ->with('name',$this->name,'title',$this->title,'shipping',$this->shipping);
    }
}
