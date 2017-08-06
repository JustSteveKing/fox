<?php

namespace App\Mail\Mailer\Contracts;

use App\Mail\Mailer\Mailer;

interface MailableContract
{
    public function send(Mailer $mailer);
}
