<?php

namespace Werner\MVC\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\HtmlRenderTrait;

class LoginForm implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderView('login/loginForm.php', [
            'title' => '',
            'activePage' => '/login',
        ]);

        return new Response(200, [], $html);
    }
}
