<?php

namespace Werner\MVC\Controller;

class InsertCourse implements InterfaceRequestController
{
    public function requestProcess(): void
    {
        $titulo = 'Cadastrar Novo Curso';
        require_once __DIR__.'/../../view/courses/insertCourse.php';
    }
}
