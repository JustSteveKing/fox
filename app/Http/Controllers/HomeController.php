<?php namespace App\Http\Controllers;

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function index(Request $request, Response $response, $params)
	{
		return $this->view->render($response, 'index.twig');
	}
}