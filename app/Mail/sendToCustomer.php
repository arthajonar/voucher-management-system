<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Contracts\Queue\ShouldQueue;

class sendToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $code;
    public $name;
    public $expire_date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$name,$expire_date)
    {
        $this->code = $code;
        $this->name = $name;
        $this->expire_date = $expire_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $code = $this->code;
        $name = $this->name;
        $expire_date = $this->expire_date;
        return $this->subject('You get a Voucher')
            ->view('email.customer',compact('code','name','expire_date'));

    }
}
