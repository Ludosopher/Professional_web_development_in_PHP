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

    protected static function getTableName()
    {
        return 'images';
    }
}