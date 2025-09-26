<?php

namespace Engine\Core\Router;

/**
 * @property array $routeGroups 
 * @property array $pattern 
 */
class UrlDispatcher
{
    private $routeGroups = [
        'GET'   => [],
        'POST'  => []
    ];

    /**
     * @param object $route
     * 
     * @return void
     */
    public function register(object $route):void
    {
        $this->routeGroups[$route->getMethod()][$route->getUrl()] = $route;
    }

    /**
     * @param string $method
     * 
     * @return array
     */
    public function getRoutes(string $method):array
    {
        return $this->routeGroups[$method];
    }

    /**
     * @param string $url
     * @param string $method
     * 
     * @return DispatchController|null
     */
    public function dispatch(string $url, string $method): ?DispatchController
    {
        $routes = $this->getRoutes($method);
        return array_key_exists($url, $routes) ? new DispatchController($routes[$url]->getAction(), []) : null;
    }
}

