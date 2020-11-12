<?php

namespace App\src\controller;

use App\src\DAO\PostDAO;

use App\src\DAO\CommentDAO;

use App\src\model\View;

class FrontController
{

    private $postDAO;

    private $commentDAO;

    public function __construct()
    {
        $this->postDAO = new PostDAO();

        $this->commentDAO = new CommentDAO();

        $this->view = new View();

    }

    public function home()
    {
       

        $posts = $this->postDAO->getPosts();

        return $this->view->render('home', [

            'posts' =>$posts
        ]);
    }

    public function single($id)
    {

        $post = $this->postDAO->getPost($id);

        $comments = $this->commentDAO->getCommentsFromArticle($id);

        return $this->view->render('single', [

            'post' => $post,

            'comments' => $comments
        ]);
    }

    
}