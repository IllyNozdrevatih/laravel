<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;
    protected $massage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($massage,$email)
    {
        $this->massage = $massage;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('hospital.emails.contact-mail')
            ->with([
                'massage' => $this->massage,
                'email' => $this->email
            ])
            ->subject('site Hospital');
    }
}
