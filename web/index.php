<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Server\RequestHandlerInterface;

session_start();

require_once __DIR__.'/../vendor/autoload.php';

$routes = require_once __DIR__.'/../config/routes.php';

// Tive que utilizar esta função para pegar apenas a parte relativa
// ao path da requisição, pois a variável REQUEST_URI traz junto
// os argumentos passados por GET.
$path = $_SERVER['REQUEST_URI'];
if (strpos($path, '?') !== false) {
    $length = strpos($path, '?');
    $path = substr($path, 0, $length);
}

if (!isset($path)) {
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

/** @var RequestHandlerInterface $controller */
$controller = new $classController();
$response = $controller->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
