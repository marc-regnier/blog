<?php

namespace App\src\DAO;

use App\src\model\Post;

use App\config\Parameter;

class PostDAO extends DAO
{
    private function buildObject($row)
    {
        $post = new Post();
        $post->setId($row['id']);
        $post->setTitle($row['title']);
        $post->setContent($row['content']);
        $post->setUserId($row['pseudo']);
        $post->setCreatedAt($row['created_at']);
        return $post;
    }

    public function getPosts()
    {
        $sql = 'SELECT posts.id, posts.title, users.pseudo, posts.content, posts.created_at FROM posts INNER JOIN users ON posts.users_id = users.id ORDER BY posts.id DESC';

        $result = $this->createQuery($sql);

        $posts = [];

        foreach ($result as $row) {

            $id = $row['id'];

            $posts[$id] = $this->buildObject($row);
        }

        $result->closeCursor();

        return $posts;
    }

    public function getPost($id)
    {
        $sql = "SELECT posts.id, posts.title, users.pseudo, posts.content, posts.created_at FROM posts INNER JOIN users ON posts.users_id = users.id WHERE posts.id = ?";

        $result = $this->createQuery($sql, [$id]);

        $post = $result->fetch();

        $result->closeCursor();

        return $this->buildObject($post);
    }


    public function addPost(Parameter $post, $userId)
    {

        $sql = 'INSERT INTO posts (title, users_id, content, created_at) VALUES (?, ?, ?, NOW())';

        $this->createQuery($sql, [$post->get('title'), $userId, $post->get('content')]);
    }

    public function editPost(Parameter $post, $id, $userId)
    {
        $sql = 'UPDATE posts SET title=:title, content=:content, users_id=:users_id WHERE id=:id';

        $this->createQuery($sql, [

            'title' => $post->get('title'),

            'content' => $post->get('content'),

            'user_id' => $userId,

            'id' => $id
        ]);
    }

    public function deletePost($id)
    {
        $sql = 'DELETE FROM comments WHERE id = ?';

        $this->createQuery($sql, [$id]);

        $sql = 'DELETE FROM posts WHERE id = ?';

        $this->createQuery($sql, [$id]);
    }
}
