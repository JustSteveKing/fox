<?php

namespace App\Mail;

use App\Mail\Mailer\Mailable;
use App\Models\User;

class Welcome extends Mailable
{
    public function build()
    {
        return $this->subject('Test Email')
            ->view('mail/welcome.twig');
    }
}
