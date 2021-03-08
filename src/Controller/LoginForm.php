<?php

namespace Werner\MVC\Controller;

class LoginForm extends ControllerViews implements InterfaceRequestController
{
    public function requestProcess(): void
    {
        echo $this->renderView('login/loginForm.php', [
            'title' => '',
            'activePage' => '/login',
        ]);
    }
}
