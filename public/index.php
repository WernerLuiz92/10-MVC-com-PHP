<?php

if (!isset($_SERVER['PATH_INFO'])) {
    require_once 'inicio.php';
    exit();
}

switch ($_SERVER['PATH_INFO']) {
    case '/listar-cursos':
        require_once 'listar-cursos.php';
        break;

    case '/novo-curso':
        require_once 'formulario-novo-curso.php';
        break;

    default:
        require_once '404.php';
}
