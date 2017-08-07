<?php

return [
    'app' => [
        'name' => 'Fox',
        'locale' => 'en',
        'default_locale' => 'en',
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
        'driver' => 'msql',
        'host' => 'localhost',
        'port' => 3306,
        'database' => 'database',
        'username' => 'user',
        'password' => 'password',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],
    'template' => [
        'path' => __DIR__ . '/../resources/views/'
    ],
    'mail' => [
        'host' => '',
        'port' => 25,
        'from' => [
            'name' => '',
            'address' => ''
        ],
    'username' => '',
    'password' => '',
    ]
];
