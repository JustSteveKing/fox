<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Message\Welcome as WelcomeMessage;
use App\Http\Controllers\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, $params)
    {
        $this->flash->addMessage('Test', 'Test Flash Message');
        //$this->mail->to('test@test.com', 'Foxy User')->send(new Welcome($user));
        //$this->message->to('+44 - UK Mobile Number minus leading 0 -')->create(new WelcomeMessage());
        //$this->container->get('logger')->info('Sent test email');
        return $this->view->render($response, 'index.twig');
    }
}
