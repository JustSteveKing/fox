<?php

namespace App\Base;

use Slim\Container;

abstract class AbstractMiddleware
{
    protected $app;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }
}
