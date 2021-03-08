<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Helper\HtmlRenderTrait;

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
