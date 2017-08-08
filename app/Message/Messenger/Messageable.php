<?php

namespace App\Message\Messenger;

use App\Message\Messenger\Messenger;
use App\Message\Messenger\Contracts\MessageableContract;

abstract class Messageable implements MessageableContract
{
    protected $to;

    protected $from;

    protected $view;

    protected $viewData = [];

    public function send(Messenger $messenger)
    {
        $this->build();

        $messenger->send($this->view, $this->viewData, function ($message) {
            $message->to($this->to['number']);

            if ($this->from) {
                $message->from($this->from['number']);
            }


        });
    }

    public function to($number)
    {
        $this->to = compact('number');

        return $this;
    }

    public function from($number)
    {
        $this->from = compact('number');

        return $this;
    }

    public function view($view)
    {
        $this->view = $view;

        return $this;
    }

    public function with($viewData = [])
    {
        $this->viewData = $viewData;

        return $this;
    }
}
