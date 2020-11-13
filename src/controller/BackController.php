<?php

namespace App\src\controller;

use App\src\model\View;
use App\src\DAO\PostDAO;

class BackController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function addPost($post)
    {
        if(isset($post['submit'])) {

            $postDAO = new PostDAO();

            $postDAO->addPost($post);

            header('Location: ../public/index.php');
        }
        return $this->view->render('add_Post', [
            
            'post' => $post
        ]);
    }
    
}