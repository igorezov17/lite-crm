<?php

namespace Engine\Core\Router;

/**
 * @property UrlDispatcher $dispatcher 
 */
class RouteDispatcher
{
    public $dispatcher;

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

        foreach($this->getRoutes() as $route) {
            $this->dispatcher->register($route);
        }

        return $this->dispatcher;
    }
}