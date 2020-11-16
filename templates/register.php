<?php $this->title = "Inscription"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?p=register">
        <label for="pseudo">Pseudo</label><br>
        <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
        <label for="email">Email</label><br>
        <input class="form-control" type="text" id="email" name="email" value="<?= isset($post) ? htmlspecialchars($post->get('email')): ''; ?>"><br>
        <?= isset($errors['email']) ? $errors['email'] : ''; ?>
        <label for="password">Mot de passe</label><br>
        <input class="form-control" type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>