<?php

namespace App\Table;

class Post{

    
    public function __get($key){

        $method = 'get' . ucfirst($key);

        $this->$key = $this->$method();

        return $this->$key;

    }
    
    public function getURL(){

        return 'index.php?p=post&id=' . $this->id;
    }

    public function getExtract(){

        $html = '<p>' . substr($this->content, 0, 100) . '...</p>';

        $html .= '<p><a href="' . $this->getURL() .'">Voir la suite</a></p>';

        return $html;

    }

}