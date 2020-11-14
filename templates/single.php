<?php $this->title = "Article"; ?>

<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <div>
        <h2><?= htmlspecialchars($post->getTitle()); ?></h2>
        <p><?= htmlspecialchars($post->getContent()); ?></p>
        <p>Créé le : <?= htmlspecialchars($post->getCreatedAt()); ?></p>
    </div>
    <br>
    <div class="actions">
        <a href="../public/index.php?p=editPost&id=<?= $post->getId(); ?>">Modifier</a>
    </div>
    <br>
    <a href="index.php">Retour à l'accueil</a>
    <a href="../public/index.php?p=deletePost&id=<?= $post->getId(); ?>">Supprimer</a>
</div>

<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Commentaires</h3>
    <?php

    foreach ($comments as $comment) {
    ?>
        <h4><?= htmlspecialchars($comment->getPseudo()); ?></h4>
        <p><?= htmlspecialchars($comment->getContent()); ?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt()); ?></p>
    <?php
    }
    ?>
</div>