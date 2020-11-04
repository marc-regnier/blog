<?php

namespace App\Table;

use App\App;

class Category extends Table{

    protected static $table ='category';

    public function getURL(){

        return 'index.php?p=categorie&id=' . $this->id;
    }

    

}