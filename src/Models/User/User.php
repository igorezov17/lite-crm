<?php

namespace App\Models\User;

use Engine\Core\Database\ActiveRecord;

class User
{
    use ActiveRecord;

    private $table = 'users';

    private $id;

    protected $name;

    protected $email;

    protected $password;

    public function getId()
    {
        return $this->name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPasswordd()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}