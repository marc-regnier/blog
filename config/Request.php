<?php

namespace App\config;

class Request
{
    

    public function __construct()
    {
        $this->get = new Parameter($_GET);

        $this->post = new Parameter($_POST);
        
        $this->session = new Session($_SESSION);

        $this->upload = new Upload($_FILES);
    }

    /**
     * @return Parameter
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @return Parameter
     */
    public function getPost()
    {
        return $this->post;
    }
    

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return Upload
     */
    public function getUpload()
    {
        return $this->upload;
    }
}