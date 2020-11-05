<?php

namespace App\Table;

use App\App;

class Post extends Table{

    public static function getLast(){

      return App::getDb()->query ("SELECT post.id, post.title, post.content, categories.name as categorie 
      FROM post 
      LEFT JOIN categories
        ON category_id = categories.id ", __CLASS__);

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