<?php

namespace Engine\Core\Router;

class Router
{
    public function __construct(
        private string $url,
        private string $method,
        private string $action,
    )
    {}

    public static function get($url, $action):static
    {
        return new static($url, 'GET', $action);
    }

    public static function post($url, $action) 
    {
        return new static($url, 'POST', $action);
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getAction()
    {
        return $this->action;
    }
}