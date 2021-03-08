<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Helper\HtmlRenderTrait;

class InsertCourse implements InterfaceRequestController
{
    use HtmlRenderTrait;

    public function requestProcess(): void
    {
        echo $this->renderView('courses/formCourse.php', [
            'title' => 'Cadastrar Novo Curso',
            'activePage' => '/novo-curso',
        ]);
    }
}
