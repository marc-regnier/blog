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
        $post->setCreatedAt($row['created_at']);
        return $post;
    }

    public function getPosts()
    {
        $sql = 'SELECT * FROM posts ORDER BY id DESC';

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
        $sql = 'SELECT * FROM posts WHERE id = ?';

        $result = $this->createQuery($sql, [$id]);

        $post = $result->fetch();

        $result->closeCursor();

        return $this->buildObject($post);
    }


    public function addPost($post)
    {
        extract($post);

        $sql = 'INSERT INTO posts (title, content, created_at) VALUES (?, ?, NOW())';

        $this->createQuery($sql,[$title, $content]);

    }
}