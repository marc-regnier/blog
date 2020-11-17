<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="../public/index.php">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../public/index.php">Home</a>
      </li>
      <?php
if ($this->session->get('pseudo')) {
    ?>
    <li class="nav-item active">
        <a class="nav-link" href="../public/index.php?p=logout">Déconnexion</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="../public/index.php?p=profile">Profil</a>
    </li>
    <?php if($this->session->get('roles') === 'admin') { ?>
    <li class="nav-item active">
        <a class="nav-link" href="../public/index.php?p=administration">Administration</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="../public/index.php?p=addPost">Ajouter un article</a>
    </li>
    <?php } ?>
<?php
} else {
    ?>
    <li class="nav-item active">
        <a class="nav-link" href="../public/index.php?p=register">Inscription</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../public/index.php?p=login">Connexion</a>
      </li>
<?php
}
?>
    </ul>
  </div>
</nav>

<div class="container">

    <div class="starter-template" style="padding-top: 100px;">

    <?= $content; ?>

    </div>

</div>

</body>

</html>