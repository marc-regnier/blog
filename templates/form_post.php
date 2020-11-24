<?php
$route = isset($post) && $post->get('id') ? 'editPost&id=' . $post->get('id') : 'addPost';
$submit = $route === 'addPost' ? 'Envoyer' : 'Mettre à jour';
?>
<form method="post" action="../public/index.php?p=<?= $route; ?>" enctype="multipart/form-data">
    <label for="title">Titre</label><br>
    <input class="form-control" type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')) : ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea class="form-control" id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <label for="category_id">Catégories</label><br> 
    <select name="category_id" id="category_id" class="form-control">'
    <?php
    foreach ($categories as $category)
    { ?>
        <option value="<?= $category->getId() ?>"><?= $category->getName(); ?></option>
    <?php
    }
    ?>    
    </select><br>
  <div class="custom-file">
    <input type="file" class="form-control" name="feature_image" id="feature_image">
</div><br>
    <input class="form-control btn btn-primary" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>