<?php

namespace App\Message\Messenger\Contracts;

use App\Message\Messenger\Messenger;

interface MessageableContract
{
    public function send(Messenger $messenger);
}