<?php

namespace App\Http\Controllers;

use Interop\Container\ContainerInterface;

abstract class Controller
{
    /**
     * The container instance.
     *
     * @var \Interop\Container\ContainerInterface
     */
    protected $container;

    protected $view;

    protected $mail;

    protected $message;

    protected $translator;

    protected $flash;

    /**
     * Set up controllers to have access to the container.
     *
     * @param \Interop\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->view = $container->get('view');
        $this->mail = $container->get('mail');
        $this->translator = $container->get('translator');
        $this->flash = $container->get('flash');
        //$this->message = $container->get('message');
    }
}
