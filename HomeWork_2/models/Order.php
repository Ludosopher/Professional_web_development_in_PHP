<?php

namespace App\Models;

class Order extends Model implements \DBII
{
    use \TestT;

    protected function getTableName()
    {
        return 'orders';
    }
}