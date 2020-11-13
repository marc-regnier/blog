<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{


    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['created_at']);
        return $comment;
    }


    public function getCommentsFromArticle($id)
    {
        $sql = "SELECT * FROM comments WHERE posts_id = ? ORDER BY created_at DESC";
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
