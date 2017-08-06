<?php

$app->get('/', 'App\Http\Controllers\HomeController:index')->setName('home-route');

/*$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Fox-App '/' route");
});*/
