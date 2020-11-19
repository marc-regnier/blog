<?php
$route = isset($post) && $post->get('id') ? 'editPost&id=' . $post->get('id') : 'addPost';
$submit = $route === 'addPost' ? 'Envoyer' : 'Mettre à jour';
?>
<form method="post" action="../public/index.php?p=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input class="form-control" type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')) : ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea class="form-control" id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <label for="content">Catégories</label><br>
    <select name="category">'
        <option value=""></option>
        <option value=""></option>
    </select><br>
    <input class="form-control btn btn-primary" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>