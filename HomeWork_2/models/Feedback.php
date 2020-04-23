<?php

namespace App\Models;

class Feedback extends Model implements \DBII
{
    use \TestT;

    protected function getTableName()
    {
        return 'feedback';
    }
}