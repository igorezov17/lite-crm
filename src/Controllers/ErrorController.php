<?php

namespace App\Controllers;

use Engine\Controller;

class ErrorController extends Controller
{
    public function pageNotFound():string
    {
        return '404 | Page not found';
    }
}