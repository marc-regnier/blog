<?php

namespace App\src\controller;

use App\src\DAO\Comment;
use App\src\DAO\Post;

class FrontController
{

    private $post;

    private $comment;

    public function __construct()
    {
        $this->post = new Post();
        $this->comment = new Comment();

    }

    public function home()
    {
       

        $posts = $this->post->getPosts();

        require '../templates/home.php';
    }

    public function single($id)
    {

        $posts = $this->post->getPost($id);

        $comments = $this->comment->getCommentsFromArticle($id);

        require '../templates/single.php';
    }
}