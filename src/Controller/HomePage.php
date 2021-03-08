<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Helper\HtmlRenderTrait;

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
