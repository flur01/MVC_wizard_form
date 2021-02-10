<?php 

namespace Core\database;

use Core\database\Connection;

use PDO;

class QueryBuilder 

{
    protected $pdo;

    protected $query;

    private $arguments;

    public function __construct()
    {
        $this->pdo = Connection::make();
    }

    /**
     * Select data from database.
     * @string $tableName //table name for select
     * @mixed $attributes //attributes for select
     */
    public function select(String $tableName, $attributes = [])
    {
        $pdo = $this->pdo;
        $query = '';
        $table = $tableName;
        
        if ($attributes) {
            if (!is_array($attributes)) {
    
                $query = "SELECT $attributes FROM $table";
    
            } elseif (is_array($attributes)) {
    
                $attr = implode(', ', $attributes);
                $query = "SELECT $attr FROM $table";
    
            } 
        } else {
            $query = "SELECT * FROM  $table";

        }

        $this->query = $query;

        return $this;

    }

    /**
     * Insert data to the database.
     * @string $tableName //table name for insert
     * @array $data //data for insert
     */
    public function insert(String $tableName, Array $arguments)
    {
        $pdo = Connection::make();
        $query = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $tableName,
            implode(', ', array_keys($arguments)),
            ':' . implode(', :', array_keys($arguments)),
        );
        try {

            $statement =  $pdo->prepare($query);
            $statement->execute($arguments);
            unset($this->pdo);

        } catch (PDOexception $e){
            die('404');
        }
    }


    public function update(String $tableName, Array $arguments)
    {
        $pdo = Connection::make();

        $this->arguments = $arguments;

        $setValues = array_map(function($argument){
            return " $argument = :$argument"; 
        }, array_keys($arguments));

        $setValues = implode(', ', $setValues);


        $query = sprintf(
            'UPDATE %s SET %s',
            $tableName,
            $setValues
        );

        $this->query =  $query;

        return $this;

    }


    public function where($firstArgument, $action, $secondArgument)
    {
        $this->query = $this->query . " WHERE $firstArgument $action '$secondArgument' ";
        return $this;
    }


    public function get($arguments = '')
    {
        $statement =  $this->pdo->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        unset($this->pdo);
        return $result;
    }
    

    public function getFirst()
    {
        return $this->get()[0];
    } 


    public function set()
    {
        try {
            $statement =  $this->pdo->prepare($this->query);
            $statement->execute($this->arguments);
            unset($this->pdo);

        } catch (Eception $e){
            die('404');
        }
    } 
    
}