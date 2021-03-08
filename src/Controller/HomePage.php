<?php

namespace Werner\MVC\Controller;

class HomePage implements InterfaceRequestController
{
    use HtmlRenderTrait;

    public function requestProcess(): void
    {
        echo $this->renderView('homePage.php', [
            'title' => '',
            'activePage' => '/',
        ]);
    }
}
