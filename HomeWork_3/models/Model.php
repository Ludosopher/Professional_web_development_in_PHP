<?php
namespace App\models;

use App\services\DB;

abstract class Model
{
    protected $db;
    
    abstract protected function getTableName();
    abstract protected function getClassName();
    abstract protected function getParams();

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        $params = [':id' => $id];
        return $this->db->find($sql, $params);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->findAll($sql, $this->getClassName());
    }

    public function insert()
    {
        $sql = "INSERT INTO {$this->getTableName()} (`is_admin`, `name`, `login`, `password`, `date`) 
                VALUES (:is_admin, :name, :login, :password, :date)";
        $params = $this->getParams();
        return $this->db->exec($sql, $params);
    }

    public function update($id)
    {
        $params = [];
        $setText = '';
        foreach ($this as $fieldName => $value) {
            if ($value && !is_object($value)) {
                $params = array_merge($params, [":{$fieldName}" => $value]);
                $setText .= "{$fieldName} = :{$fieldName}, ";
            }
        }
        $params = array_merge($params, [":id" => $id]);
        $setText = substr($setText, 0, -2);
        $sql = "UPDATE {$this->getTableName()} SET {$setText} WHERE id = :id";
        return $this->db->exec($sql, $params);
    }

    public function delete()
    {
        $this->id;
    }

    public function save()
    {
        //empty($this->id);
//        $this->insert();
//        $this->update();
    }
}

// foreach ($this->getOne($id) as $f => $v) {
//     if ($f == $fieldName) {
//         $sql = "UPDATE {$this->getTableName()} SET {$f} = {$value} WHERE id = "; 
//     }
// }