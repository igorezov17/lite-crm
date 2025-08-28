<?php

namespace Engine;

use Engine\Di\Di;
use Engine\Core\Router\Router;

class App
{

    public function __construct(
        public Di $di,
    )
    {}

    public function run():void
    {
        $router = $this->di->get('router');
        $router->add('/', '/', 'HomeController');

        dd($this->di);
    }
}