<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Helper\FlashMessageTrait;
use Werner\MVC\Helper\HtmlRenderTrait;

class PageNotFound implements InterfaceRequestController
{
    use HtmlRenderTrait;
    use FlashMessageTrait;

    public function requestProcess(): void
    {
        $this->setFlashMessage('warning', '<i class="fas fa-exclamation-triangle me-1"></i> A página solicitada não existe!');
        http_response_code(404);

        echo $this->renderView('pageNotFound.php', [
            'title' => '404 - Página não encontrada!',
        ]);
    }
}
