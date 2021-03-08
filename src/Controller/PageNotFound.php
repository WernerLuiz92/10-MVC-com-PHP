<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Helper\FlashMessageTrait;

class PageNotFound extends ControllerViews implements InterfaceRequestController
{
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
