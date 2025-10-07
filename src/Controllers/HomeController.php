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

        $modelUser = $this->load->model('User');
        $users = $modelUser->repository->getUsers();
        $userUpdate = $modelUser->repository->updateUser();
        // $userUpdate = $modelUser->repository->create([
        //     'name'      => 'Jeff',
        //     'email'     => 'jf@google.com',
        //     'password'  => 123
        // ]);
        
        // echo "<pre>";
        // print_r($userUpdate);
        //     echo "</pre>";

        $users = $this->db->query($sql, $queBuild->getParams());
        return $this->view->render('home/index', ['users' => $users]);
    }
}