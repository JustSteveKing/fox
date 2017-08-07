<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Noodlehaus\Config;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;


session_start();

$app = new Slim\App([
    'settings' => [
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
    ]
]);

$container = $app->getContainer();

$container['config'] = function () {
    return new Config(__DIR__ . '/../config');
};

$container['translator'] = function ($container) {
    $config = $container->config;
    $translator = new Translator($config->get('app.locale'));
    $translator->setFallbackLocales([$config->get('app.default_locale')]);
    $translator->addLoader('array', new ArrayLoader);

    $finder = new Finder;
    $langDirs = $finder->directories()->ignoreUnreadableDirs()->in(__DIR__ . '/../resources/lang');

    foreach ($langDirs as $dir) {
        $translator->addResource(
            'array',
            (new Config($dir))->all(),
            $dir->getRelativePathName()
        );
    }

    return $translator;
};

// Logger
$container['logger'] = function ($container) {
    $config = $container->config;
    $logger = new Monolog\Logger($config->get('logger.name'));
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($config->get('logger.path'), $config->get('logger.level')));
    return $logger;
};

// Database
$container['capsule'] = function ($container) {
    $config = $container->config;
    $capsule = new Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($config->get('database'));
    return $capsule;
};

// View
$container['view'] = function ($container) {
    $config = $container->config;
    $view = new \Slim\Views\Twig(
        $config->get('view.template_path'), 
        $config->get('view.twig')
    );
    // Add extensions
    $view->addExtension(
    	new Slim\Views\TwigExtension(
    		$container['router'], 
    		$container['request']->getUri()
    	)
    );
    $view->addExtension(new Twig_Extension_Debug());
    $view->addExtension(new App\Views\TranslateExtension($container['translator']));
    return $view;
};

// Mail
$container['mail'] = function ($container) {
    $config = $container->config;

    $transport = (new Swift_SmtpTransport($config->get('mail.host'), $config->get('mail.port')))
        ->setUsername($config->get('mail.username'))
        ->setPassword($config->get('mail.password'));

    $swift = new Swift_Mailer($transport);

    return (new App\Mail\Mailer\Mailer($swift, $container->view))
        ->alwaysFrom($config->get('mail.from.address'), $config->get('mail.from.name'));
};


require __DIR__ . '/../routes/web.php';

$capsule = $app->getContainer()->get('capsule');
$capsule->bootEloquent();
