<?php

namespace Engine\Core\Router;

class DispatchRouter
{

    public function __construct(
        private string $controller,
        private array $action
    )
    {}

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

}