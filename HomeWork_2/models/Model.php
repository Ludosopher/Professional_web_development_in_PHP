<?php

namespace App\Models;

/**
 * Class Model
 *
 */
abstract class Model
{
    protected $db;

    abstract protected function getTableName();

    public function __construct(\DBI $db)
    {
        //var_dump($db);
        $this->db = $db;
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
        return $this->db->find($sql);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->findAll($sql);
    }
}