<?php

namespace App\src\controller;

use App\config\Request;

use App\src\model\View;

use App\src\DAO\PostDAO;

use App\src\DAO\CommentDAO;


abstract class Controller
{

    protected $postDAO;

    protected $commentDAO;

    protected $view;

    private $request;

    protected $get;

    protected $post;

    protected $session;


    public function __construct()
    {
        $this->postDAO = new PostDAO();

        $this->commentDAO = new CommentDAO();

        $this->view = new View();

        $this->request = new Request();

        $this->get = $this->request->getGet();

        $this->post = $this->request->getPost();
        
        $this->session = $this->request->getSession();
        

    }

}