<?php

namespace Werner\MVC\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Werner\MVC\Helper\HtmlRenderTrait;

class LoginForm implements InterfaceRequestController
{
    use HtmlRenderTrait;

    public function requestProcess(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderView('login/loginForm.php', [
            'title' => '',
            'activePage' => '/login',
        ]);

        return new Response(200, [], $html);
    }
}
