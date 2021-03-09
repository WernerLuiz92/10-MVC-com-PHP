<?php

namespace Werner\MVC\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\HtmlRenderTrait;

class HomePage implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(RequestInterface $request): ResponseInterface
    {
        $html = $this->renderView('homePage.php', [
            'title' => '',
            'activePage' => '/',
        ]);

        return new Response(200, [], $html);
    }
}
