<?php

session_start();

require_once __DIR__.'/../vendor/autoload.php';

$routes = require_once __DIR__.'/../config/routes.php';
$path = $_SERVER['PATH_INFO'];

if (!isset($_SERVER['PATH_INFO'])) {
    $path = '/';
} elseif (!array_key_exists($path, $routes)) {
    $path = '/*';
}

$isLoginRoute = stripos($path, 'login');

if (!isset($_SESSION['logged_user']) && $isLoginRoute === false && $path != '/') {
    header('Location: /login');
    exit();
}

$classController = $routes[$path];

/** @var InterfaceRequestController $classController */
$controller = new $classController();
$controller->requestProcess();
