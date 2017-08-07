<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Exception\InvalidPathException;

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (InvalidPathException $e) {
    throw new InvalidPathException($e->getMessage());
}

session_start();

$app = new Slim\App([
    'settings' => include __DIR__ . '/../config/app.php'
]);

require __DIR__ . '/container.php';


// Middleware loading - uncomment if you want all middleware to be loaded for the application, otherwise keep middleware loading for Routes only
/*$middleware = new hanneskod\classtools\Iterator\ClassIterator(
	(new Symfony\Component\Finder\Finder)->in(__DIR__ . '/../app/Http/Middleware')
);

foreach ($middleware->getClassMap() as $classname => $fileInfo) {
	$app->add(new $classname());
}*/

require __DIR__ . '/../routes/web.php';

$capsule = $app->getContainer()->get('capsule');
$capsule->bootEloquent();
