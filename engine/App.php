<?php

namespace Engine;

use Engine\Core\Router\DispatchRouter;
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
        $router->add('/home', '/home', 'HomeController:index');
        $router->add('/new', '/new/(int:id)', 'NewController:index');

        $dispatcher = $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

        if (!$dispatcher) {
            $dispatcher = new DispatchRouter('ErrorController:pageNotFound', []);
        }

        [$controller, $action] = explode(":", $dispatcher->getController());

        $controller = "App\\Controllers\\" . $controller;

        call_user_func_array([new $controller($this->di), $action], []);
    }
}