<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
    public $routeGroups = [
        'GET'   => [],
        'POST'  => []
    ];

    private $pattern = ['int' => '[0-9]+'];

    public function register($pattern, $controller, $method)
    {
        $this->routeGroups[$method][$pattern] = $controller;
    }

    public function getRoutes($method):?array
    {
        return $this->routeGroups[$method] ?? null;
    }

    public function dispatch($url, $method)
    {
        return new DispatchRouter('HomeController:index', []);
    }
}

