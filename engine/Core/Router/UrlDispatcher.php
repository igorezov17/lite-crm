<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
    public $routesGroup = [
        'GET'   => [],
        'POST'  => []
    ];

    public function register($pattern, $controller, $method)
    {
        $this->routesGroup[$method][$pattern] = $controller;
    }

    public function dispatch($url, $method)
    {
        return new DispatchRouter('HomeController', []);
    }
}

