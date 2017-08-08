<?php

namespace App\Views;

use Twig_Extension;
use Slim\Flash\Messages;
use Twig_SimpleFunction;

class FlashExtension extends Twig_Extension
{

    protected $flash;

    public function __construct(Messages $flash)
    {
        $this->flash = $flash;
    }

    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('flash', [$this, 'flash']),
            new Twig_SimpleFunction('hasMessage', [$this, 'hasMessage']),
        ];
    }

    public function flash($key = null)
    {
        if (! is_null($key)) {
            return $this->flash->getMessage($key);
        }
        return $this->flash->getMessages();
    }

    public function hasMessage($key)
    {
        return $this->flash->hasMessage($key);
    }
}
