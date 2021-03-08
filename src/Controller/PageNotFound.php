<?php

namespace Werner\MVC\Controller;

class PageNotFound implements InterfaceRequestController
{
    public function requestProcess(): void
    {
        $titulo = '404 - Página não encontrada!';
        require_once __DIR__.'/../View/pageNotFound.php';
        http_response_code(404);
    }
}