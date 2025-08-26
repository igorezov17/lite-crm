<?php

namespace Engine\Services\Route;

use Engine\Services\AbstractProvider;
use Engine\Core\Router\RouterInterface;

class Provider extends AbstractProvider
{

    public $serviceName = 'router';

    public function init():void
    {
        $router = new RouterInterface();
        $this->di->set($this->serviceName, $router);
    }
}