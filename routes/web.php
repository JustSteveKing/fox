<?php

$app->get('/', 'App\Http\Controllers\HomeController:index')
    ->setName('home-route')->add(
    	(new App\Http\Middleware\ThrottleMiddleware($container['redis']))->setRateLimit(10, 10)
    );

/*$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Fox-App '/' route");
});*/
