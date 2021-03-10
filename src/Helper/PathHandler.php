<?php

namespace Werner\MVC\Helper;

use Psr\Http\Message\ServerRequestInterface;

class PathHandler
{
    public static function handle(ServerRequestInterface $request, array $routes): string
    {
        $uri = $request->getUri();
        $path = $uri->getPath();

        $classControllerRoutes = array_merge($routes['needAuth'], $routes['byPass']);

        if (!array_key_exists($path, $classControllerRoutes)) {
            $path = '/*';
        }

        if (!isset($_SESSION['logged_user']) && array_key_exists($path, $routes['needAuth'])) {
            $path = '/login';
        }

        $classController = $classControllerRoutes[$path];

        return $classController;
    }
}
