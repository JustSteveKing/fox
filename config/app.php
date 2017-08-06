<?php

return [
    'determineRouteBeforeAppMiddleware' => false,
    'displayErrorDetails' => getenv('APP_DEBUG') === 'true',
    'app' => [
    'name' => getenv('APP_NAME') || 'Fox'
],
    'view' => [
    'template_path' => __DIR__ . '/../resources/views',
    'twig' => [
    'cache' => __DIR__ . '/../storage/app/cache/twig',
    'debug' => true,
],
],
    'logger' => [
    'name' => 'fox-app',
    'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../storage/logs/app.log',
    'level' => \Monolog\Logger::DEBUG,
],
    'db' => [
    'driver' => getenv('DB_CONNECTION'),
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'database' => getenv('DB_DATABASE'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
    'charset'   => getenv('DB_CHARSET'),
    'collation' => getenv('DB_COLLATION'),
    'prefix'    => getenv('DB_PREFIX'),
],
    'template' => [
    'path' => __DIR__ . '/../resources/views/'
],
    'mail' => [
    'host' => getenv('MAIL_HOST'),
    'port' => getenv('MAIL_PORT'),
    'from' => [
    'name' => getenv('MAIL_FROM_NAME'),
    'address' => getenv('MAIL_FROM_ADDRESS')
],
    'username' => getenv('MAIL_USERNAME'),
    'password' => getenv('MAIL_PASSWORD'),
]
];
