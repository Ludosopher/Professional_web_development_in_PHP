<?php

namespace App\Models;

class Good extends Model implements \DBII
{
    use \TestT;

    protected function getTableName()
    {
        return 'goods';
    }
}