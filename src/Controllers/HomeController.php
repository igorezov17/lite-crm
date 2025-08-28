<?php 

namespace Engine;

use Engine\Controller;

class HomeController extends Controller
{
    public function index()
    {
        print_r("This is HomeController");
    }
}