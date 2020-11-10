<?php

use App\src\DAO\Post;
use App\src\DAO\Comment;

$post = new Post();
$posts = $post->getPost($_GET['id']);
$post = $posts->fetch()
?>
<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <div>
        <h2><?= htmlspecialchars($post->title); ?></h2>
        <p><?= htmlspecialchars($post->content); ?></p>
        <p>Créé le : <?= htmlspecialchars($post->createdAt); ?></p>
    </div>
    <br>
    <?php
    $posts->closeCursor();
    ?>
    <a href="index.php">Retour à l'accueil</a>
</div>

<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Commentaires</h3>
    <?php
    $comment = new Comment();
    $comments = $comment->getCommentsFromArticle($_GET['id']);
    while ($comment = $comments->fetch()) {
    ?>
        <h4><?= htmlspecialchars($comment->pseudo); ?></h4>
        <p><?= htmlspecialchars($comment->content); ?></p>
        <p>Posté le <?= htmlspecialchars($comment->createdAt); ?></p>
    <?php
    }
    $comments->closeCursor();
    ?>
</div>