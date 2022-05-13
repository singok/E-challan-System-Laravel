<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contactus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $email;
    public $phone;
    public $message;
    public function __construct($fullname, $email, $phone, $message)
    {
        $this->name = $fullname;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('auths.smallDetails',['name' => $this->name, 'phone' => $this->phone, 'email' => $this->email, 'message' => $this->message]);
    }
}
