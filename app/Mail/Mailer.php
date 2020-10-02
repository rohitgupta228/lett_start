<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailer extends Mailable
{

    use Queueable,
        SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'janeexampexample@example.com';
        $subject = 'This is a demo!';
        $name = 'Jane Doe';

        return $this->view('emails.password_reset')
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
//                        ->cc($this->data['cc_emails'], $this->data['cc_name'])
//                        ->bcc($this->data['bcc_emails'], $this->data['bcc_name'])
                        ->replyTo('rohit.gupta171994@gmail.com', 'rohit')
                        ->subject($subject)
                        ->with(['test_message' => $this->data['message']]);
    }

}
