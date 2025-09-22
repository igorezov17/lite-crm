<?php

namespace Engine\Services\View;

use Engine\Core\Template\View;
use Engine\Services\AbstractProvider;

class Provider extends AbstractProvider
{
    private $serviceName = 'view';

    public function init()
    {
        $view = new View();
        $this->di->set($this->serviceName, $view);
    }
}