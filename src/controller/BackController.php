<?php

namespace App\src\controller;

use App\config\Parameter;



class BackController extends Controller
{

    private function checkLoggedIn()
    {
        if (!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?p=login');
        } else {
            return true;
        }
    }

    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if (!($this->session->get('roles') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ../public/index.php?p=profile');
        } else {
            return true;
        }
    }


    public function addPost(Parameter $post)
    {

        if ($this->checkAdmin()) {
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
    }

    public function editPost(Parameter $post, $id)
    {
        if ($this->checkAdmin()) {

            $article = $this->postDAO->getPost($id);

            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'post');

                if (!$errors) {

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

            $post->set('author', $article->getAuthor());


            return $this->view->render('edit_post', [
                'post' => $post
            ]);
        }
    }

    public function deletePost($id)
    {
        if ($this->checkAdmin()) {

            $this->postDAO->deletePost($id);

            $this->session->set('delete_post', 'L\' article a bien été supprimé');

            header('Location: ../public/index.php?p=administration');
        }
    }

    public function unflagComment($commentId)
    {
        if ($this->checkAdmin()) {
            $this->commentDAO->unflagComment($commentId);
            $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
            header('Location: ../public/index.php?p=administration');
        }
    }

    public function deleteComment($id)
    {
        if ($this->checkAdmin()) {
            $this->commentDAO->deleteComment($id);

            $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');

            header('Location: ../public/index.php');
        }
    }

    public function profile()
    {
        if ($this->checkLoggedIn()) {
            return $this->view->render('profile');
        }
    }

    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {

                $this->userDAO->updatePassword($post, $this->session->get('pseudo'));

                $this->session->set('update_password', 'Le mot de passe a été mis à jour');

                header('Location: ../public/index.php?p=profile');
            }
            return $this->view->render('update_password');
        }
    }

    public function logout()
    {
        if($this->checkLoggedIn()) 
        {

        $this->logoutOrDelete('logout');

        }
    }

    public function deleteAccount()
    {
        if($this->checkLoggedIn())
        {
        $this->userDAO->deleteAccount($this->session->get('pseudo'));

        $this->logoutOrDelete('delete_account');
        }
    }

    public function deleteUser($userId)
    {
        if($this->checkAdmin()) 
        {
        $this->userDAO->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
        header('Location: ../public/index.php?p=administration');
        }
    }

    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if ($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: ../public/index.php');
    }

    public function administration()
    {
        if ($this->checkAdmin()) {
            $posts = $this->postDAO->getPosts();

            $categories = $this->cateDAO->getCategories();

            $comments = $this->commentDAO->getFlagComments();

            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [

                'posts' => $posts,

                'categories' => $categories,

                'comments' => $comments,

                'users' => $users
            ]);
        }
    }



    public function deleteCategory($id)
    {
        if ($this->checkAdmin()) {

            $this->cateDAO->deleteCategory($id);

            $this->session->set('delete_cate', 'La catégorie a bien été supprimé');

            header('Location: ../public/index.php?p=administration');
        }
    }

    public function addCategory(Parameter $category)
    {

        if ($this->checkAdmin()) {
            if ($category->get('submit')) {

                $errors = $this->validation->validate($category, 'category');

                if (!$errors) {

                    $this->cateDAO->addCategory($category, $this->session->get('id'));

                    $this->session->set('add_post', 'La nouvelle catégorie  a bien été ajouté');

                    header('Location: ../public/index.php?p=administration');
                }

                return $this->view->render('add_Post', [

                    'category' => $category,

                    'errors' => $errors
                ]);
            }

            return $this->view->render('add_cate');
        }
    }


}
