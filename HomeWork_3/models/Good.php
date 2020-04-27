<?php
namespace App\models;

class Good extends Model
{
    public $id;
    public $file_name;
    public $width;
    public $product_name;
    public $price;
    public $views;
    
    protected function getTableName()
    {
        return 'images';
    }

    protected function getClassName()
    {
        return get_class();
    }

    protected function getParams()
    {
        return $params = [
            ':file_name' => $this->file_name,
            ':width' => $this->width,
            ':product_name' => $this->product_name,
            ':price' => $this->price,
            ':views' => $this->views
        ];
    }
}