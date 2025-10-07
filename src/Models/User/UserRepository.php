<?php

namespace App\Models\User;

use Engine\Model;

class UserRepository extends Model
{
    public function getUsers():array
    {
        $sql = $this->queryBuilder
            ->select()
            ->from('users')
            ->where('id', 2)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->getParams());
    }

    public function updateUser():void
    {
        $user = new User(1);
        // $user->setName('Jogh');
        // $user->setEmail('jh@google.com');
        $user->setPassword(123);
        $user->save();
    }

    public function create(array $params):void
    {
        $user = new User();
        $user->setName('Jogh');
        $user->setEmail('jh@google.com');
        $user->setPassword(123);
        $user->save();
    }
}