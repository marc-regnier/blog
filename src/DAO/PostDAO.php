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
        $post->setAuthor($row['pseudo']);
        $post->setCreatedAt($row['created_at']);
        $post->setCategory($row['name']);
        return $post;
    }

    public function getPosts()
    {
        $sql = "SELECT posts.id, posts.title, users.pseudo, posts.content, posts.created_at, categories.name FROM posts INNER JOIN users ON posts.users_id = users.id 
        INNER JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC";

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
        $sql = "SELECT posts.id, posts.title, users.pseudo, posts.content, posts.created_at, categories.name  FROM posts INNER JOIN users ON posts.users_id = users.id
        INNER JOIN categories ON posts.category_id = categories.id WHERE posts.id = ?";

        $result = $this->createQuery($sql, [$id]);

        $post = $result->fetch();

        $result->closeCursor();

        return $this->buildObject($post);
    }


    public function addPost(Parameter $post, $userId)
    {
                    $file = $_FILES['feature_image'];
                    $fileName = basename($_FILES["feature_image"]["name"]);
                    $supportedFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

                    if (in_array($file['type'], $supportedFormats))
                    {

                        if(move_uploaded_file($file['tmp_name'], '../uploads/'. $fileName))
                        {
                            $sql = "INSERT INTO posts (title, users_id, content, category_id, feature_image, created_at) VALUES (?, ?, ?, ?, '$fileName', NOW())";

                            $this->createQuery($sql, [$post->get('title'), $userId, $post->get('content'), $post->get('category_id')]);
                        }
                    }
        

    }

    public function editPost(Parameter $post, $id, $userId)
    {
        $sql = 'UPDATE posts SET title = :title, content = :content, users_id = :user_id, category_id = :category_id WHERE id=:id';

        $this->createQuery($sql, [

            'title' => $post->get('title'),

            'content' => $post->get('content'),

            'category_id' => $post->get('category_id'),

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
