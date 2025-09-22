<?php

namespace Engine;

use Engine\Container\Di;
use Engine\Core\Template\View;

class Controller
{
    protected View $view;

    public function __construct(
        protected Di $di,

    )
    {
        $this->view = $this->di->get('view');
    }
}