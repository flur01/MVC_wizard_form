<?php


namespace Core\database;

use Core\App;

use PDO;

class Connection 
{
    /**
     * Make connection to the database.
     */
    public static function make()
    {
        $config = App::get('config')['database'];
        try {
            
            return new PDO(
                $config['connection'].';dbname='.$config['name'],

                $config['username'],
                
                $config['password'],

                $config['options']
            );
        
        } catch (PDOexception $e) {
        
            die($e->getMessage());
        
        }
                
    }


}