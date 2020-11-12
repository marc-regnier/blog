<?php

namespace App\src\DAO;

use App\src\model\Post;

class PostDAO extends DAO
{
    private function buildObject($row)
    {
        $post = new Post();
        $post->setId($row['id']);
        $post->setTitle($row['title']);
        $post->setContent($row['content']);
        $post->setCreatedAt($row['createdAt']);
        return $post;
    }

    public function getPosts()
    {
        $sql = 'SELECT id, title, content, createdAt FROM post ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $posts = [];
        foreach ($result as $row){
            $id = $row['id'];
            $posts[$id] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $posts;
    }

    public function getPost($id)
    {
        $sql = 'SELECT id, title, content, createdAt FROM post WHERE id = ?';
        $result = $this->createQuery($sql, [$id]);
        $post = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($post);
    }
}