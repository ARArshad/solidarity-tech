<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;

    public function __construct( $user)
    {

        $this->user = $user;
    }

    /**
     * @return WelcomeEmail
     */
    public function build(): WelcomeEmail
    {
        return $this->view('emails.welcome')
            ->subject('Welcome to Your Application');
    }
}
