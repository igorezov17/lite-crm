<?php

namespace Engine\Core\Router;

/**
 * @property UrlDispatcher $dispatcher 
 */
class RouteDispatcher
{
    public $dispatcher;

    /**
     * @return iterable|null
     */
    private function getRoutes():?iterable
    {
        return require APP_DIR . '/engine/Config/routes.php';
    }

    /**
     * @param string $url
     * @param string $method
     * 
     * @return DispatchController|null
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