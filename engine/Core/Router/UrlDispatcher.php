<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
    public $routeGroups = [
        'GET'   => [],
        'POST'  => []
    ];

    private $pattern = ['int' => '[0-9]+'];

    /**
     * @param string $pattern
     * @param string $controller
     * @param string $method
     * @return void
     */
    public function register(string $pattern, string $controller, string $method):void
    {
        $this->routeGroups[$method][$pattern] = $controller;
    }

    /**
     * @param string $method
     * @return ?array
     */
    public function getRoutes($method):?array
    {
        return $this->routeGroups[$method] ?? null;
    }

    /**
     * @param string $url
     * @param string $method
     * @return ?DispatchRouter
     */
    public function dispatch(string $url, string $method): ?DispatchRouter
    {
        $routes = $this->getRoutes($method);
        return array_key_exists($url, $routes) ? new DispatchRouter($routes[$url], []) : null;
    }
}

