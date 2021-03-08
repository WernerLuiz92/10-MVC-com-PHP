<?php

namespace Werner\MVC\Controller;

class ControllerViews
{
    public function renderView(string $templatePath, array $data): void
    {
        extract($data);
        require_once __DIR__.'/../View/'.$templatePath;
    }
}
