<?php

namespace Engine\Core\Router;

class DispatchRouter
{

    public function __construct(
        private string $controller,
        private array $action
    )
    {}

    public function getontroller()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->controller;
    }

}