<?php

namespace Werner\MVC\Controller;

class LoginForm implements InterfaceRequestController
{
    use HtmlRenderTrait;

    public function requestProcess(): void
    {
        echo $this->renderView('login/loginForm.php', [
            'title' => '',
            'activePage' => '/login',
        ]);
    }
}
