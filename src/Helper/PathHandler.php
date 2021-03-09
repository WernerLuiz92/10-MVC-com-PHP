<?php

namespace Werner\MVC\Helper;

class PathHandler
{
    public static function handle(string $requestURI, array $routes): string
    {
        $path = $requestURI;

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
            $path = '/login';
        }

        $classController = $routes[$path];

        return $classController;
    }
}
