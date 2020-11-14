<?php

namespace App\src\controller;

use App\config\Parameter;



class BackController extends Controller
{


    public function addPost(Parameter $post)
    {
        if ($post->get('submit')) {

            $errors = $this->validation->validate($post, 'post');

            if (!$errors) {

                $this->postDAO->addPost($post);

                $this->session->set('add_post', 'Le nouvel article a bien été ajouté');

                header('Location: ../public/index.php');
            }

            return $this->view->render('add_Post', [

                'post' => $post,

                'errors' => $errors
            ]);
        }

        return $this->view->render('add_post');
    }

    public function editPost(Parameter $post, $id)
    {
        $article = $this->postDAO->getPost($id);

        if ($post->get('submit')) 
        {
            $errors = $this->validation->validate($post, 'post');

            if (!$errors) {

                $this->postDAO->editPost($post, $id);

                $this->session->set('edit_post', 'L\' article a bien été modifié');

                header('Location: ../public/index.php');
            }
        

        return $this->view->render('edit_post', [

            'article' => $article,

            'errors' => $errors

        ]);

        }

        $post->set('id', $article->getId());
        $post->set('title', $article->getTitle());
        $post->set('content', $article->getContent());

        return $this->view->render('edit_post', [
            'article' => $article
        ]);
    }
}
