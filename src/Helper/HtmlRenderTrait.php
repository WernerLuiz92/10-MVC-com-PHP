<?php

namespace Werner\MVC\Helper;

trait HtmlRenderTrait
{
    public function renderView(string $templatePath, array $data): string
    {
        extract($data);
        ob_start();
        require_once __DIR__.'/../View/'.$templatePath;
        $view = ob_get_clean();

        return $view;
    }
}
