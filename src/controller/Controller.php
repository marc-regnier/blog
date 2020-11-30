<?php

namespace App\src\controller;

use App\config\Request;

use App\src\model\View;

use App\src\DAO\CateDAO;

use App\src\DAO\PostDAO;

use App\src\DAO\UserDAO;

use App\src\DAO\CommentDAO;

use App\src\constraint\Validation;

use App\src\DAO\Pagination;

abstract class Controller
{

    protected $postDAO;

    protected $cateDAO;

    protected $commentDAO;

    protected $userDAO;

    protected $view;

    private $request;

    protected $get;

    protected $post;

    protected $session;

    protected $upload;

    protected $validation;

    protected $pagination;


    public function __construct()
    {
        $this->postDAO = new PostDAO();

        $this->cateDAO = new CateDAO();

        $this->commentDAO = new CommentDAO();

        $this->userDAO = new UserDAO();

        $this->view = new View();

        $this->request = new Request();

        $this->validation = new Validation();

        $this->pagination = new Pagination();

        $this->get = $this->request->getGet();

        $this->post = $this->request->getPost();
        
        $this->session = $this->request->getSession();

        

    }

}