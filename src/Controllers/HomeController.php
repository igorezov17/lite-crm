<?php 

namespace App\Controllers;

use Engine\Controller;
use Engine\Core\Database\QueryBuilder;

class HomeController extends Controller
{
    public function index()
    {
        $queBuild = new QueryBuilder();
        $sql = $queBuild
                ->select()
                ->from('orders')
                ->where('id', '2', '>')
                ->sql();

        $users = $this->db->query($sql, $queBuild->getParams());
        return $this->view->render('home/index', ['users' => $users]);
    }
}