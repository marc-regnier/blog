<?php
$route = isset($category) && $category->get('id') ? 'editCategory&id='.$category->get('id') : 'addCategory';
$submit = $route === 'addCategory' ? 'Envoyer' : 'Mettre à jour';
?>
<form method="post" action="../public/index.php?p=<?= $route; ?>">
    <label for="name">Category</label><br>
    <input type="text" id="name" name="name" value="<?= isset($category) ? htmlspecialchars($category->get('name')): ''; ?>"><br>
    <?= isset($errors['name']) ? $errors['name'] : ''; ?>
    <label for="slug">Slug</label><br>
    <textarea id="slug" name="slug"><?= isset($category) ? htmlspecialchars($category->get('slug')): ''; ?></textarea><br>
    <?= isset($errors['slug']) ? $errors['slug'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>