<?php

namespace Werner\MVC\Controller;

class PageNotFound extends ControllerViews implements InterfaceRequestController
{
    public function requestProcess(): void
    {
        http_response_code(404);

        echo $this->renderView('pageNotFound.php', [
            'title' => '404 - Página não encontrada!',
        ]);
    }
}
