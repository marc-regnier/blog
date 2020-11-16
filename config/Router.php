<?php

namespace App\config;

use App\src\controller\BackController;

use App\src\controller\ErrorController;

use App\src\controller\FrontController;

use Exception;

class Router
{

    private $frontController;

    private $backController;

    private $errorController;

    private $request;


    public function __construct()
    {
        $this->frontController = new FrontController();

        $this->backController = new BackController();

        $this->errorController = new ErrorController();

        $this->request = new Request();

    }

    public function run()
    {

        $p = $this->request->getGet()->get('p');

        try
        {
            if(isset($p))
            {
                if($p === 'post')
                {
                   $this->frontController->single($this->request->getGet()->get('id'));

                }
                else if($p === 'addPost')
                {

                    $this->backController->addPost($this->request->getPost());

                }
                elseif ($p === 'editPost')
                {
                    $this->backController->editPost($this->request->getPost(), $this->request->getGet()->get('id'));
                }
                elseif ($p === 'deletePost')
                {
                    $this->backController->deletePost($this->request->getGet()->get('id'));
                }
                elseif($p === 'addComment')
                {
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('id'));
                }
                elseif($p === 'flagComment')
                {
                    $this->frontController->flagComment($this->request->getGet()->get('id'));
                }
                else if($p === 'deleteComment')
                {
                    $this->backController->deleteComment($this->request->getGet()->get('id'));
                }
                elseif($p === 'register'){
                    $this->frontController->register($this->request->getPost());
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else
            {
                
                $this->frontController->home();
            }
        }
        catch(Exception $e)
        {
            $this->errorController->errorServer();
        }
    }

}
