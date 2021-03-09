<?php

namespace Werner\MVC\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Werner\MVC\Helper\HtmlRenderTrait;

class HomePage implements InterfaceRequestController
{
    use HtmlRenderTrait;

    public function requestProcess(RequestInterface $request): ResponseInterface
    {
        $html = $this->renderView('homePage.php', [
            'title' => '',
            'activePage' => '/',
        ]);

        return new Response(200, [], $html);
    }
}
