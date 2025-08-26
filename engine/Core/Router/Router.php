<?php

namespace Engine\Core\Router;

class Router implements RouterInterface
{
    public $routes = [];

    public $dispatch;

    public function add(string $key, string $pattern, string $controller, string $method = 'GET'):void
    {
        $this->routes[$key] = [
            'pattern'       => $pattern,
            'controller'    => $controller,
            'method'        => $method
        ];
    }

    public function dispatch()
    {

    }
}