<?php
namespace App\models;

class User extends Model
{
    public $id;
    public $is_admin;
    public $name;
    public $login;
    public $password;
    public $date;

    protected function getTableName()
    {
        return 'users';
    }

    protected function getClassName()
    {
        return get_class();
    }

    protected function getParams()
    {
        return $params = [
            ':is_admin' => $this->is_admin,
            ':name' => $this->name,
            ':login' => $this->login,
            ':password' => $this->password,
            ':date' => $this->date
        ];
    }

}