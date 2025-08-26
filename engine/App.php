<?php

namespace Engine;

use Engine\Di\Di;

class App
{

    public function __construct(
        public Di $di,
    )
    {}

    public function run():void
    {
        dd($this->di->get('router'));
    }
}