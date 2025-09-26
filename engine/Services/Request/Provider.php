<?php

namespace Engine\Services\Request;

use Engine\Core\Http\Request;
use Engine\Services\AbstractProvider;

class Provider extends AbstractProvider
{
    private $serviceName = 'request';

    public function init():void
    {
        $request = Request::createFromGlobals();
        $this->di->set($this->serviceName, $request);
    }
}