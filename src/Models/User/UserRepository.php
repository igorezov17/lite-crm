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
}