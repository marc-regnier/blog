<?php

namespace App\src\controller;

use App\config\Request;

use App\src\model\View;

use App\src\DAO\PostDAO;

use App\src\DAO\UserDAO;

use App\src\DAO\CommentDAO;

use App\src\constraint\Validation;


abstract class Controller
{

    protected $postDAO;

    protected $commentDAO;

    protected $userDAO;

    protected $view;

    private $request;

    protected $get;

    protected $post;

    protected $session;

    protected $validation;


    public function __construct()
    {
        $this->postDAO = new PostDAO();

        $this->commentDAO = new CommentDAO();

        $this->userDAO = new UserDAO();

        $this->view = new View();

        $this->request = new Request();

        $this->validation = new Validation();

        $this->get = $this->request->getGet();

        $this->post = $this->request->getPost();
        
        $this->session = $this->request->getSession();
        

    }

}