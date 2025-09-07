<?php

namespace Engine;

use Engine\Container\Di;

class Controller
{
    public function __construct(protected Di $di)
    {}
}