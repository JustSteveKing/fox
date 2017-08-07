<?php

$app->get('/', 'App\Http\Controllers\HomeController:index')
    ->setName('home-route')
    ->add(new App\Http\Middleware\ExampleMiddleware($app));

/*$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Fox-App '/' route");
});*/
