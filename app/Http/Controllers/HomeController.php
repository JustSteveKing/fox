<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Http\Controllers\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, $params)
    {
        //$this->mail->to('test@test.com', 'Foxy User')->send(new Welcome($user));
        //$this->container->get('logger')->info('Sent test email');
        return $this->view->render($response, 'index.twig', [
            'flash' => $this->flash->addMessage('Test', 'Test Flash Message')
        ]);
    }
}
