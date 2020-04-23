<?php
//namespace App\Serices;
interface DBI
{
    /**
     * Получение одной записи
     *
     * @param string $sql
     * @return mixed
     */
    public function find(string $sql);
    public function findAll(string $sql);
}