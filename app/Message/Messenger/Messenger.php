<?php

namespace App\Message\Messenger;

use App\Message\Messenger\Contracts\MessageableContract;
use App\Message\Messenger\MessageBuilder;
use Slim\Views\Twig;
use Twilio\Rest\Client as TwilioClient;

class Messenger
{
    protected $client;

    protected $twig;

    protected $from;

    public function __construct(TwilioClient $client, Twig $twig)
    {
        $this->client = $client;
        $this->twig = $twig;
    }

    public function to($number)
    {
        return (new PendingMessageable($this))->to($number);
    }

    public function alwaysFrom($number)
    {
        $this->from = compact('number');

        return $this;
    }

    public function from($number)
    {
        $this->from = $number;
        return $this;
    }


    public function create($view, $viewData = [], callable $callback = null)
    {
        if ($view instanceof MessageableContract) {
            return $this->sendMessageable($view);
        }

        $message = $this->buildMessage();

        call_user_func($callback, $message);

        $message->body($this->parseView($view, $viewData));

        return $this->client->messages->create(
            $message->getTo(),
            [
                'from' => $this->from,
                'body' => $message->getMessage()
            ]
        );
    }

    protected function sendMessageable(Messageable $messageable)
    {
        return $messageable->create($this);
    }

    protected function buildMessage()
    {
        return (new MessageBuilder(new Message))
            ->from($this->from);
    }

    protected function parseView($view, $viewData)
    {
        return $this->twig->fetch($view, $viewData);
    }
}
