<?php

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Fox-App '/' route");
});
