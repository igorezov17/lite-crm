<?php

namespace Engine\Core\Router;

class RouteDispatcher
{
    /** 
     * @var array
     */
    public $routes = [];

    /** 
     * @var UrlDispatcher
     */
    public $dispatcher;

    // /** 
    //  * @param string $key
    //  * @param string $pattern
    //  * @param string $controller
    //  * @param string $method
    //  * @return void
    //  */
    // public function add(string $key, string $pattern, string $controller, string $method = 'GET'):void
    // {
    //     $this->routes[$key] = [
    //         'pattern'       => $pattern,
    //         'controller'    => $controller,
    //         'method'        => $method
    //     ];
    // }

    private function getRoutes():?iterable
    {
        return require APP_DIR . '/engine/Config/routes.php';
    }

    /**
     * @param string $url
     * @param string $method
     * @return DispatchController
     */
    public function dispatch(string $url, string $method):?DispatchController
    {
        return $this->getDispatcher()->dispatch($url, $method);
    }

    /**
     * @return UrlDispatcher
     */
    private function getDispatcher()
    {
        if ($this->dispatcher === null) {
            $this->dispatcher = new UrlDispatcher();
        }

        // foreach($this->routes as $route) {
        foreach($this->getRoutes() as $route) {

            // echo "<pre>";
            // print_r($route->getUrl());
            // echo "</pre>";

            // $this->dispatcher->register($route['pattern'], $route['controller'], $route['method']);
            $this->dispatcher->register($route);
        }

        return $this->dispatcher;
    }
}