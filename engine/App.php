<?php

namespace Engine;

use Engine\Core\Router\DispatchController;
use Engine\Container\Di;
use Engine\Core\Router\Router;

class App
{
    /** 
     * @var Di
     */
    public function __construct(
        public Di $di,
    )
    {}

    /** 
     * @return void
     */
    public function run():void
    {
        $router     = $this->di->get('router');
        $request    = $this->di->get('request');
        $dispatcher = $router?->dispatch($request->getUrl(), $request->getMethod());

        if (!$dispatcher) {
            $dispatcher = new DispatchController('App\Controllers\ErrorController:pageNotFound', []);
        }

        [$controller, $action] = explode(":", $dispatcher->getController());

        call_user_func_array([new $controller($this->di), $action], []);
    }
}