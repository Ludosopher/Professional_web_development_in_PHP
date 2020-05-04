<?php
namespace App\models;

use App\services\DB;

/**
 * Class Model
 * @package App\models
 *
 * @property int $id
 */
abstract class Model
{
    /**
     * @var DB
     */
    protected $db;

    abstract protected static function getTableName();

    public function __construct()
    {
        $this->db = static::getDB();
    }

    protected static function getDB(): DB
    {
        return DB::getInstance();
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $params = [':id' => $id];
        return static::getDB()->queryObject($sql, static::class, $params);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return static::getDB()->queryObjects($sql, static::class);
    }

    protected function insert()
    {
        //INSERT INTO goods (name, info, price) VALUES (:name, :info, :price)
        $columns = [];
        $params = [];
        foreach ($this as $fieldName => $value) {
            if ($fieldName == 'id' || $fieldName == 'db') {
                continue;
            }
            $columns[] = $fieldName;
            $params[':' . $fieldName] = $value;
        }

        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} 
                    (" . implode(', ', $columns) . ")
                VALUES 
                (" . implode(', ', array_keys($params)) . ")
                ";

        $this->db->exec($sql, $params);
        $this->id =$this->db->lastInsertId();
    }

    protected function update($id)
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
                                                                          // мои методы
    public function delete($id)
    {
        $params = [];
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        $params = [':id' => $id];
        return $this->db->exec($sql, $params);
    }
//
   public function save($id)
   {
        $arr = static::getAll();
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i]->id == $id) {
                return $this->update($id);
            } 
        }
        return $this->insert();
   }
                                                                    // методы преподавателя
    // public function delete()
    // {
    //     $sql = "DELETE FROM `users` WHERE id = :id";
    //     $this->db->exec($sql, [':id' => $this->id]);
    // }

    // public function save()
    // {
    //     if (empty($this->id)) {
    //         $this->insert();
    //     }
    //     $this->update();
    // }
}