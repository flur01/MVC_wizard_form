<?php


namespace Models;

use Core\database\Model;

class User extends Model
{
    protected $tableName = 'users';

    public function setDefaultImage($rows)
    {       
        $dir = 'images/';
        $path = str_replace('models', '', __DIR__);


        foreach ($rows as $key => $row) {

            if (!$row['photo'] || !file_exists($path .  'public/' . $dir . $row['photo'])) {
                $rows[$key]['photo']= $dir . 'default.png';
            } else{
                $rows[$key]['photo']= $dir . $rows[$key]['photo'];
            }
        }

        return $rows;
    }
}