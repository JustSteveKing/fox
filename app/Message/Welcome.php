<?php

namespace App\Message;

use App\Message\Messenger\Messageable;

class Welcome extends Messageable
{
    public function build()
    {
        return $this->view('message/welcome.twig');
    }
}
