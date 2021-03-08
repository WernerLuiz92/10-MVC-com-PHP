<?php

namespace Werner\MVC\Controller;

class Logout implements InterfaceRequestController
{
    public function requestProcess(): void
    {
        session_destroy();
        header('Location: /');
    }
}
