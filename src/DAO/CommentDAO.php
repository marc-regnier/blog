<?php

namespace App\src\DAO;

use App\config\Parameter;
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

    public function addComment(Parameter $post, $id)
    {
        $sql = 'INSERT INTO comments (pseudo, content, created_at, posts_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'), $id]);
    }
    
}
