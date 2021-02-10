<?php


namespace Core\database;

use Core\database\QueryBuilder;

class Model
{
    protected $tableName; 
   

    public function select($attributes = [])
    {
        $quertBuilder = new QueryBuilder();
        return $quertBuilder->select($this->tableName, $attributes);
    }
    

    public function insert($attributes = [])
    {
        $quertBuilder = new QueryBuilder();
        return $quertBuilder->insert($this->tableName, $attributes);
    }


    public function update($attributes = [])
    {
        $quertBuilder = new QueryBuilder();
        return $quertBuilder->update($this->tableName, $attributes);
    }

}