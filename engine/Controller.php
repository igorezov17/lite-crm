<?php

namespace Engine;

use Engine\Di\Di;

class Controller
{
    public function __construct(protected Di $di)
    {}
}