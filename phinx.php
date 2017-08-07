<?php

require __DIR__ . '/bootstrap/app.php';

$config = $container['config'];

return [
    'paths' => [
        'migrations' => 'database/migrations',
    ],
    'migration_base_class' => 'App\Database\Migrations\Migration',
    'templates' => [
        'file' => 'app/Database/Migrations/MigrationsStub.php'
    ],
    'environments' => [
        'deafult_migration_table' => 'migrations',
        'default' => [
            'adapter' => $config->get('database.driver'),
            'host' => $config->get('database.host'),
            'port' => $config->get('database.port'),
            'name' => $config->get('database.database'),
            'user' => $config->get('database.username'),
            'pass' => $config->get('database.password'),
            'charset' => $config->get('database.charset')
        ]
    ]
];
