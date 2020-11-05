<?php

namespace App\Table;

use App\App;

class Table
{

    protected static $table;

    private static function getTable()
    {

        if (static::$table === null) {

            $class_name = explode('\\', get_called_class());

            static::$table = strtolower(end($class_name));
        }

        return static::$table;
    }

    public static function find($id){



    }

    public static function all()
    {
        return App::getDb()->query("SELECT * FROM " . static::getTable() . "", get_called_class());
    }


    public function __get($key)
    {

        $method = 'get'.ucfirst($key);

        $this->$key = $this->$method();

        return $this->$key;
        
    }



    
}
