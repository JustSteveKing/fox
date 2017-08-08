<?php

namespace App\Message\Messenger;

use App\Message\Messenger\Message;

class MessageBuilder
{
    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function to($number)
    {
        $this->message->setTo($number);

        return $this;
    }



    public function body($body)
    {
        $this->message->setBody($body);

        return $this;
    }

    public function from($number)
    {
        $this->message->setFrom($number);

        return $this;
    }

    public function getmessage()
    {
        return $this->message->getBody();
    }

    public function getTo()
    {
        return $this->message->getTo();
    }
}
