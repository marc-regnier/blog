<?php

namespace App\src\controller;

use App\config\Parameter;


class FrontController extends Controller
{


    public function home()
    {

        $posts = $this->postDAO->getPosts();

        return $this->view->render('home', [

            'posts' => $posts,
            
            
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

    public function register(Parameter $post)
    {
        if($post->get('submit')) 
        {
            $errors = $this->validation->validate($post, 'user');

            if($this->userDAO->checkUser($post)) 
            {
                $errors['pseudo'] = $this->userDAO->checkUser($post);
            }

            if(!$errors) 
            {
                $this->userDAO->register($post);

                $this->session->set('register', 'Votre inscription a bien été effectuée');

                header('Location: ../public/index.php');
            }

        return $this->view->render('register', [

            'post' => $post,

            'errors' => $errors
        ]);
        }

        return $this->view->render('register');
    }

    public function login(Parameter $post)
    {
        if($post->get('submit')) 
        {
            $result = $this->userDAO->login($post);

            if($result && $result['isPasswordValid'])
            {
                $this->session->set('login', 'Content de vous revoir');

                $this->session->set('id', $result['result']['id']);

                $this->session->set('roles', $result['result']['roles']);

                $this->session->set('pseudo', $post->get('pseudo'));

                header('Location: ../public/index.php');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');

                return $this->view->render('login', [
                    
                    'post'=> $post
                    
                ]);
            }
        }
        return $this->view->render('login');
    }

}
