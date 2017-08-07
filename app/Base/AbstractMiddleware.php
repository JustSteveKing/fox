<?php

namespace App\Base;

use Slim\App;

abstract class AbstractMiddleware
{
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }
}
