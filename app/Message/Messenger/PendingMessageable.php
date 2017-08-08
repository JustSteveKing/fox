<?php

namespace App\Message\Messenger;

use App\Message\Messenger\Messenger;

class PendingMessageable
{
    public function __construct(Messenger $messenger)
    {
        $this->messenger = $messenger;
    }

    public function to($number)
    {
        $this->to = compact('number');

        return $this;
    }

    public function send(Messageable $messageable)
    {
        $messageable->to($this->to['number']);

        return $this->messenger->send($messageable);
    }
}
