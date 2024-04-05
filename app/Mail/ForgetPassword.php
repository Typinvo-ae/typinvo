<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $token;
    public $email;

    public $type;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;

    }


    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
       
        return $this->subject('Erp Confirm Password')->markdown('user::auth.mails');
     
    }
}
