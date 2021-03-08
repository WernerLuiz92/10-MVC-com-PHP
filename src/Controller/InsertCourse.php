<?php

namespace Werner\MVC\Controller;

class InsertCourse extends ControllerViews implements InterfaceRequestController
{
    public function requestProcess(): void
    {
        $this->renderView('courses/formCourse.php', [
            'title' => 'Cadastrar Novo Curso',
            'activePage' => '/novo-curso',
        ]);
    }
}
