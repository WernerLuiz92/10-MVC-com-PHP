<?php

namespace Werner\MVC\Controller;

class HomePage implements InterfaceRequestController
{
    public function requestProcess(): void
    {
        $titulo = 'Página Inicial';
        require_once __DIR__.'/../View/homePage.php';
    }
}
