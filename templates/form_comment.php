<?php
$route = isset($article) && $article->get('id') ? 'editComment' : 'addComment'; 
$submit = $route === 'addComment' ? 'Ajouter' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?p=<?= $route; ?>&id=<?= htmlspecialchars($post->getId()); ?>">
    <label for="pseudo">Pseudo</label><br>
    <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?= isset($article) ? htmlspecialchars($article->get('pseudo')): ''; ?>"><br>
    <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    <label for="content">Message</label><br>
    <textarea class="form-control" id="content" name="content"><?= isset($article) ? htmlspecialchars($article->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input class="form-control btn btn-primary" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>