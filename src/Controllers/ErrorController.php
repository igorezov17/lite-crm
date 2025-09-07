<?php

namespace App\Controllers;

use Engine\Controller;

class ErrorController extends Controller
{
    public function pageNotFound():void
    {
        echo '404 | Page not found';
    }
}