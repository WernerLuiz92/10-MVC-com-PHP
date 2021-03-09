<?php

use Werner\MVC\Controller\DeleteCourse;
use Werner\MVC\Controller\HomePage;
use Werner\MVC\Controller\InsertCourse;
use Werner\MVC\Controller\ListCourses;
use Werner\MVC\Controller\ListCoursesJson;
use Werner\MVC\Controller\ListCoursesXML;
use Werner\MVC\Controller\LoginForm;
use Werner\MVC\Controller\Logout;
use Werner\MVC\Controller\PageNotFound;
use Werner\MVC\Controller\Persist;
use Werner\MVC\Controller\UpdateCourse;
use Werner\MVC\Controller\ValidateLogin;

$routes = [
];

$routes = [
    'needAuth' => [
        '/listar-cursos' => ListCourses::class,
        '/novo-curso' => InsertCourse::class,
        '/salvar-curso' => Persist::class,
        '/excluir-curso' => DeleteCourse::class,
        '/alterar-curso' => UpdateCourse::class,
        '/logout' => Logout::class,
    ],
    'byPass' => [
        '/' => HomePage::class,
        '/*' => PageNotFound::class,
        '/login' => LoginForm::class,
        '/realiza-login' => ValidateLogin::class,
        '/listarCursosJson' => ListCoursesJson::class,
        '/listarCursosXML' => ListCoursesXML::class,
        '/resetar-senha' => LoginForm::class,
    ],
];

return $routes;
