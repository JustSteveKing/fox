<?php

namespace App\Views;

class ConfigurationExtension extends \Twig_Extension
{

    protected $configuration;

    public function __construct($configuration)
    {
        $this->configuration = $configuration;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('config')
        ];
    }

    public function config($key)
    {
        return $this->config->get($key);
    }

}
