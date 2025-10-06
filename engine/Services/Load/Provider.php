<?php

namespace Engine\Services\Load;

use Engine\Load;
use Engine\Services\AbstractProvider;

class Provider extends AbstractProvider
{
    private $serviceName = 'load';

    public function init()
    {
        $load = new Load();
        $this->di->set($this->serviceName, $load);
    }
}