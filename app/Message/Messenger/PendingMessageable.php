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
        $this->to = $number;

        return $this;
    }

    public function create(Messageable $messageable)
    {
        $messageable->to($this->to);

        return $this->messenger->create($messageable);
    }
}
