<?php
$p = isset($article) && $article->getId() ? 'editPost&id='.$article->getId() : 'addPost';

$submit = $p === 'addPost' ? 'Envoyer' : 'Mettre à jour';

$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : '';

$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()) : '';

?>

<form method="post" action="../public/index.php?p=addPost">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= $title; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= $content; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="Envoyer" id="submit" name="submit">
</form>