<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData; // public property to hold contact info

    /**
     * Create a new message instance.
     */
    public function __construct($contactData)
    {
        $this->contactData = $contactData; // assign incoming data
    }

    /**
     * Build the message.
     */
    public function build()
    {
         return $this->subject('New Contact Message')
                ->view('email.contact_email');
    }
}
