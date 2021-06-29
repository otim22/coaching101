<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserContacted extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactData = [])
    {
        $this->contactData = (object) $contactData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = null;

        if (property_exists($this->contactData, 'email')) {
            $email = $this->contactData->email;
        }

        $mail = $this->markdown('emails.contact.index');

        if (! is_null($email)) {
            $mail = $mail->replyTo($email);
        }

        return $mail;
    }
}
