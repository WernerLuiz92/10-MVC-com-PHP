<?php

namespace Werner\MVC\Controller;

class HomePage extends ControllerViews implements InterfaceRequestController
{
    public function requestProcess(): void
    {
        $this->renderView('homePage.php', [
            'title' => 'Página Inicial',
            'activePage' => '/',
        ]);
    }
}
