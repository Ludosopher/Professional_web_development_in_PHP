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

    protected static function getTableName()
    {
        return 'users';
    }
}