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
        $this->mail->to('test@test.com', 'Foxy User')->send(new Welcome($user));
        return $this->view->render($response, 'index.twig');
    }
}
