<?php

namespace Werner\MVC\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\HtmlRenderTrait;

class InsertCourse implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderView('courses/formCourse.php', [
            'title' => 'Cadastrar Novo Curso',
            'activePage' => '/novo-curso',
        ]);

        return new Response(200, [], $html);
    }
}
