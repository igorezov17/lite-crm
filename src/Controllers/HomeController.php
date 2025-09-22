<?php 

namespace App\Controllers;

use Engine\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view->render('home/index');
    }
}