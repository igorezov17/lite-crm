<?php 

namespace App\Controllers;

use Engine\Controller;

class HomeController extends Controller
{
    public function index()
    {

        // $view = $this->di->get('view');

        return $this->view->render('home/index');

        // print_r("This is HomeController");
    }
}