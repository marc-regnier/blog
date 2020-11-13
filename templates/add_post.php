<?php $this->title = "Nouvel article"; ?>
<h1>Mon blog</h1>
<p>En construction</p>

<form class method="post" action="../public/index.php?p=addPost">
    <div class="form-group">
        <label for="title">Titre</label><br>
        <input class="form-control" type="text" id="title" name="title"><br>
    </div>
    <div class="form-group">
        <label for="content">Contenu</label><br>
        <textarea class="form-control" id="content" name="content"></textarea><br>
    </div>
        <input type="submit" value="Envoyer" id="submit" name="submit">
</form>
    <a href="../public/index.php">Retour à l'accueil</a>
