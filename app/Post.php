<?php

use App\Database;

class Post extends Database{

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