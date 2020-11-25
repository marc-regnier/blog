<?php
$route = isset($category) && $category->get('id') ? 'editCategory&id='.$category->get('id') : 'addCategory';
$submit = $route === 'addCategory' ? 'Envoyer' : 'Mettre à jour';
?>
<form method="post" action="../public/index.php?p=<?= $route; ?>">
    <label for="name">Categorie</label><br>
    <input class="form-control" type="text" id="name" name="name" value="<?= isset($category) ? htmlspecialchars($category->get('name')): ''; ?>"><br>
    <?= isset($errors['name']) ? $errors['name'] : ''; ?>
    <label for="slug">Slug</label><br>
    <input class="form-control" name="slug" value="<?= isset($category) ? htmlspecialchars($category->get('slug')): ''; ?>"><br>
    <?= isset($errors['slug']) ? $errors['slug'] : ''; ?>
    <input class="btn btn-primary" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>