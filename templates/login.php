<?php $this->title = "Connexion"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('error_login'); ?>
<div>
    <form method="post" action="../public/index.php?p=login">
        <label for="pseudo">Pseudo</label><br>
        <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input class="form-control" type="password" id="password" name="password"><br>
        <input class="form-control btn btn-primary" type="submit" value="Connexion" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>