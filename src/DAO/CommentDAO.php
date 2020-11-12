<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{


    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        return $comment;
    }


    public function getCommentsFromArticle($id)
    {
        $sql = 'SELECT comment.id, comment.content, comment.createdAt, users.username as pseudo FROM comment LEFT JOIN users ON comment.user_id = users.id WHERE post_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$id]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
    
}
