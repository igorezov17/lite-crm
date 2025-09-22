<?php

namespace Engine\Services\Database;

use Engine\Core\Database\DBQuery;
use Engine\Services\AbstractProvider;

class Provider extends AbstractProvider
{
    private $serviceName = 'db';

    public function init()
    {
        $db = new DBQuery();
        $this->di->set($this->serviceName, $db);
    }
}