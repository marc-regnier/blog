<?php

namespace App\src\controller;

use App\src\DAO\PostDAO;

use App\src\DAO\CommentDAO;

class FrontController
{

    private $postDAO;

    private $commentDAO;

    public function __construct()
    {
        $this->postDAO = new PostDAO();
        $this->commentDAO = new CommentDAO();

    }

    public function home()
    {
       

        $posts = $this->postDAO->getPosts();

        require '../templates/home.php';
    }

    public function single($id)
    {

        $posts = $this->postDAO->getPost($id);

        $comments = $this->commentDAO->getCommentsFromArticle($id);

        require '../templates/single.php';
    }
}