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

                $this->postDAO->addPost($post, $this->session->get('id'));;

                $this->session->set('add_post', 'Le nouvel article a bien été ajouté');

                header('Location: ../public/index.php?p=administration');
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

            if (!$errors) 
            {

                $this->postDAO->editPost($post, $id, $this->session->get('id'));

                $this->session->set('edit_post', 'L\' article a bien été modifié');

                header('Location: ../public/index.php?p=administration');
            }
        

        return $this->view->render('edit_post', [

            'post' => $post,

            'errors' => $errors

        ]);

        }

        $post->set('id', $article->getId());

        $post->set('title', $article->getTitle());

        $post->set('content', $article->getContent());

        $post->set('author', $article->getUserId());


        return $this->view->render('edit_post', [
            'post' => $post
        ]);

        
    }

    public function deletePost($id)
    {
        $this->postDAO->deletePost($id);

        $this->session->set('delete_post', 'L\' article a bien été supprimé');
        
        header('Location: ../public/index.php?p=administration');
    }

    public function unflagComment($commentId)
    {
        $this->commentDAO->unflagComment($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: ../public/index.php?p=administration');
    }

    public function deleteComment($id)
    {
        $this->commentDAO->deleteComment($id);

        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');

        header('Location: ../public/index.php');
    }

    public function profile()
    {
        return $this->view->render('profile');
    }

    public function updatePassword(Parameter $post)
    {
        if($post->get('submit')) {

            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));

            $this->session->set('update_password', 'Le mot de passe a été mis à jour');

            header('Location: ../public/index.php?p=profile');
        }
        return $this->view->render('update_password');
    }

    public function logout()
    {
        $this->logoutOrDelete('logout');

    }

    public function deleteAccount()
    {
        $this->userDAO->deleteAccount($this->session->get('pseudo'));

        $this->logoutOrDelete('delete_account');
    }

    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: ../public/index.php');
    }

    public function administration()
    {
        $posts = $this->postDAO->getPosts();

        $comments = $this->commentDAO->getFlagComments();

        return $this->view->render('administration', [

            'posts' => $posts,

            'comments' => $comments
        ]);
    }

    
}
