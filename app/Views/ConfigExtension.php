<?php

namespace App\Views;

class ConfigExtension extends \Twig_Extension
{

    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('config', [$this, 'config'])
        ];
    }

    public function config($key)
    {
        return $this->config->get($key);
    }

}
