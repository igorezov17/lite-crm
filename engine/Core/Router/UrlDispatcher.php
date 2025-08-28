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
    public function register(object $route):void
    {
        $this->routeGroups[$route->getMethod()][$route->getUrl()] = $route;
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
     * @return ?DispatchController
     */
    public function dispatch(string $url, string $method): ?DispatchController
    {
        $routes = $this->getRoutes($method);

        // foreach($routes as $key => $route) {
        //     dd($route);
        // }

    //    dd($routes[$url]->getAction());

        return array_key_exists($url, $routes) ? new DispatchController($routes[$url]->getAction(), []) : null;
    }
}

