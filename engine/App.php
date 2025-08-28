<?php

namespace Engine;

use Engine\Core\Router\DispatchController;
use Engine\Di\Di;
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
        $router = $this->di->get('router');

        $dispatcher = $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

        if (!$dispatcher) {
            $dispatcher = new DispatchController('App\Controllers\ErrorController:pageNotFound', []);
        }

        [$controller, $action] = explode(":", $dispatcher->getController());

        call_user_func_array([new $controller($this->di), $action], []);
    }
}