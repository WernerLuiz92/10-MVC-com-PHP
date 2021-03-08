<?php

namespace Werner\MVC\Controller;

class HomePage extends ControllerViews implements InterfaceRequestController
{
    public function requestProcess(): void
    {
        echo $this->renderView('homePage.php', [
            'title' => '',
            'activePage' => '/',
        ]);
    }
}
