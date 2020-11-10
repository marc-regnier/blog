<?php

namespace App\src\DAO;

class Post extends DAO{

    public function getPosts(){

        $sql = "SELECT id, title, content, createdAt FROM post ORDER BY id DESC";

        return $this->createQuery($sql);
    }

    public function getPost($id)
    {

        $sql = "SELECT id, title, content, createdAt FROM post WHERE id = ?";

        return $this->createQuery($sql,[$id]);
    }
}