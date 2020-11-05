<?php

namespace App\Table;

use App\App;

class Category extends Table{

    protected static $table ='categories';


    public function getCategory(){
        $this->categories;
    }


    public function getURL(){

        return 'index.php?p=category&id=' . $this->id;
    }

    

}