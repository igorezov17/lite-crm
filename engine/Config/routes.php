<?php

use Engine\Core\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\NewController;


return [
    '/home' => Router::get('/home', HomeController::class . ":index"),
    '/new'  => Router::get('/new', NewController::class . ":index"),
    // '/test' => Router::post('/test', NewController::class),
];