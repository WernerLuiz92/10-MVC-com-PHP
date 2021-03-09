<?php

namespace Werner\MVC\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\FlashMessageTrait;
use Werner\MVC\Helper\HtmlRenderTrait;

class PageNotFound implements RequestHandlerInterface
{
    use HtmlRenderTrait;
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->setFlashMessage('warning', '<i class="fas fa-exclamation-triangle me-1"></i> A página solicitada não existe!');

        $html = $this->renderView('pageNotFound.php', [
            'title' => '404 - Página não encontrada!',
        ]);

        return new Response(404, [], $html);
    }
}
