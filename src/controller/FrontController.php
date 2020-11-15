<?php

namespace App\src\controller;

use App\config\Parameter;


class FrontController extends Controller
{


    public function home()
    {

        $posts = $this->postDAO->getPosts();

        return $this->view->render('home', [

            'posts' => $posts
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

    public function addComment(Parameter $post, $id)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'comment');

            if (!$errors) {

                $this->commentDAO->addComment($post, $id);

                $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');

                header('Location: ../public/index.php');
            }


            $article = $this->postDAO->getPost($id);

            $comments = $this->commentDAO->getCommentsFromArticle($id);

            return $this->view->render('single', [

                'article' => $article,

                'comments' => $comments,

                'post' => $post,

                'errors' => $errors
            ]);
        }
    }

    public function flagComment($id)
    {
        $this->commentDAO->flagComment($id);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header('Location: ../public/index.php');
    }

}
