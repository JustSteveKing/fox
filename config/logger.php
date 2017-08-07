<?php

return [
    'logger' => [
        'name' => 'fox-app',
        'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../storage/logs/app.log',
        'level' => \Monolog\Logger::DEBUG,
    ]
];