<?php

namespace Engine\Core\Router;

class Router
{
    public $routes = [];

    public $dispatcher;

    public function add(string $key, string $pattern, string $controller, string $method = 'GET'):void
    {
        $this->routes[$key] = [
            'pattern'       => $pattern,
            'controller'    => $controller,
            'method'        => $method
        ];
    }

    /**
     * @param string $url
     * @param string $method
     * @return DispatchRouter
     */
    public function dispatch(string $url, string $method):DispatchRouter
    {
        return $this->getDispatcher()->dispatch($url, $method);
    }

    private function getDispatcher()
    {
        if ($this->dispatcher === null) {
            $this->dispatcher = new UrlDispatcher();
        }

        foreach($this->routes as $route) {
            $this->dispatcher->register($route['pattern'], $route['controller'], $route['method']);
        }

        return $this->dispatcher;

    }
}