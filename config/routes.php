<?php

use Werner\MVC\Controller\DeleteCourse;
use Werner\MVC\Controller\HomePage;
use Werner\MVC\Controller\InsertCourse;
use Werner\MVC\Controller\ListCourses;
use Werner\MVC\Controller\LoginForm;
use Werner\MVC\Controller\Logout;
use Werner\MVC\Controller\PageNotFound;
use Werner\MVC\Controller\Persist;
use Werner\MVC\Controller\UpdateCourse;
use Werner\MVC\Controller\ValidateLogin;

$routes = [
    '/listar-cursos' => ListCourses::class,
    '/novo-curso' => InsertCourse::class,
    '/salvar-curso' => Persist::class,
    '/excluir-curso' => DeleteCourse::class,
    '/alterar-curso' => UpdateCourse::class,
    '/login' => LoginForm::class,
    '/realiza-login' => ValidateLogin::class,
    '/logout' => Logout::class,
    // '/resetar-senha' => '',
    '/' => HomePage::class,
    '/*' => PageNotFound::class,
];

return $routes;
