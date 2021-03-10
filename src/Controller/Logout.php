<?php

namespace Werner\MVC\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\FlashMessageTrait;

class Logout implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        session_destroy();

        session_start();
        $this->setFlashMessage('info', 'Usuário desconectado!', true);

        return new Response(302, [
            'Location' => '/',
        ]);
    }
}
