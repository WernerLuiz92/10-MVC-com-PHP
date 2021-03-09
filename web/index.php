<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Werner\MVC\Controller\InterfaceRequestController;

session_start();

require_once __DIR__.'/../vendor/autoload.php';

$routes = require_once __DIR__.'/../config/routes.php';
$path = $_SERVER['PATH_INFO'];

var_dump($path);

exit();

if (!isset($_SERVER['PATH_INFO'])) {
    $path = '/';
} elseif (!array_key_exists($path, $routes)) {
    $path = '/*';
}

$isLoginRoute = stripos($path, 'login');

if (!isset($_SESSION['logged_user']) && $isLoginRoute === false && $path != '/' && $path != '/*') {
    header('Location: /login');
    exit();
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$classController = $routes[$path];

/** @var InterfaceRequestController $classController */
$controller = new $classController();
$response = $controller->requestProcess($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
