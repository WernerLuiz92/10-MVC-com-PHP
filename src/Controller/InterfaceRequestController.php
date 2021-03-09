<?php

namespace Werner\MVC\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface InterfaceRequestController
{
    public function requestProcess(ServerRequestInterface $request): ResponseInterface;
}
