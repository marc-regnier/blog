<?php $this->title = "Modifier l'article"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?p=editPost&id=<?= htmlspecialchars($article->getId()); ?>">
        <div class="form-group">
            <label for="title">Titre</label><br>
            <input class="form-control" type="text" id="title" name="title" value="<?= htmlspecialchars($article->getTitle()); ?>">
        </div><br>
        <div class="form-group">
            <label for="content">Contenu</label><br>
            <textarea class="form-control" id="content" name="content"><?= htmlspecialchars($article->getContent()); ?></textarea>
        </div><br>
        <input class="form-control" type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>