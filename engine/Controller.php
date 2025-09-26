<?php

namespace Engine;

use Engine\Container\Di;
use Engine\Core\Database\DBQuery;
use Engine\Core\Template\View;

class Controller
{
    protected View $view;

    protected DBQuery $db;

    public function __construct(
        protected Di $di,

    )
    {
        $this->view = $this->di->get('view');
        $this->db   = $this->di->get('db');
    }
}