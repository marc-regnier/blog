<?php

namespace App\src\DAO;

class Comment extends DAO
{
    public function getCommentsFromArticle($id){

        $sql = 'SELECT users.username as pseudo, content, createdAt FROM comment INNER JOIN users ON comment.user_id = users.id  WHERE post_id = ? ORDER BY createdAt DESC';

        return $this->createQuery($sql,[$id]);
    }
}
