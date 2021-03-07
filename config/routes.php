<?php

use Werner\MVC\Controller\DeleteCourse;
use Werner\MVC\Controller\HomePage;
use Werner\MVC\Controller\InsertCourse;
use Werner\MVC\Controller\ListCourses;
use Werner\MVC\Controller\PageNotFound;
use Werner\MVC\Controller\Persist;
use Werner\MVC\Controller\UpdateCourse;

$routes = [
    '/listar-cursos' => ListCourses::class,
    '/novo-curso' => InsertCourse::class,
    '/salvar-curso' => Persist::class,
    '/excluir-curso' => DeleteCourse::class,
    '/alterar-curso' => UpdateCourse::class,
    '/' => HomePage::class,
    '/*' => PageNotFound::class,
];

return $routes;
