<?php

use Engine\Container\Di;
use Engine\App;

try {

    $di = new Di();
    $providers = require_once __DIR__ . "/Config/services.php";

    foreach ($providers as $provider) {
        $service = new $provider($di);
        $service->init();
    }

    $app = new App($di);
    $app->run();
    

} catch(\Exception $e) {
    echo $e->getMessage();
}