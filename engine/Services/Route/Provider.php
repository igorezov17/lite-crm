<?php

namespace Engine\Services\Route;

use Engine\Core\Router\RouteDispatcher;
use Engine\Services\AbstractProvider;

class Provider extends AbstractProvider
{

    public $serviceName = 'router';

    public function init():void
    {
        $router = new RouteDispatcher();
        $this->di->set($this->serviceName, $router);
    }
}