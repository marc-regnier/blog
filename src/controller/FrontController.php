<?php

namespace App\src\controller;

class FrontController extends Controller
{


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