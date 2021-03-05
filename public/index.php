<?php

require_once __DIR__.'/../vendor/autoload.php';

use Werner\MVC\Controller\HomePage;
use Werner\MVC\Controller\InsertCourse;
use Werner\MVC\Controller\ListCourses;
use Werner\MVC\Controller\PageNotFound;

if (!isset($_SERVER['PATH_INFO'])) {
    $controller = new HomePage();
    $controller->requestProcess();
    exit();
}

switch ($_SERVER['PATH_INFO']) {
    case '/listar-cursos':
        $controller = new ListCourses();
        $controller->requestProcess();
        break;

    case '/novo-curso':
        $controller = new InsertCourse();
        $controller->requestProcess();
        break;

    default:
    $controller = new PageNotFound();
    $controller->requestProcess();
}
