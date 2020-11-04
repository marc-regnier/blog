<?php

namespace App\Table;

use App\App;

class Post extends Table{

    public static function getLast(){

      return App::getDb()->query("SELECT post.id, post.title, post.content, category.name as categorie FROM post LEFT JOIN category ON post.category_id = category.id ", __CLASS__);

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