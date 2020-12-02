<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
  <title>DevUni - <?= $title ?></title>
</head>

<body>
  <header>
    <div id="banner">
      <h1>DevUni</h1>
      <h4>Blog sur le développement web</h4>
    </div>
    <div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
    </div >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../public/index.php">DevUni</a>
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
            <?php if ($this->session->get('roles') === 'admin') { ?>
              <div class="dropdown show">
                <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Administration
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="../public/index.php?p=adminPost">Admin-Post</a>
                  <a class="dropdown-item" href="../public/index.php?p=adminCate">Admin-Categorie</a>
                  <a class="dropdown-item" href="../public/index.php?p=adminComment">Admin-Comment</a>
                  <a class="dropdown-item" href="../public/index.php?p=adminUser">Admin-User</a>
                </div>
              </div>
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
  </header>


  <div class="container">

    <div class="starter-template" style="padding-top: 100px;">

      <?= $content; ?>

    </div>

  </div>
  <footer class="page-footer">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 mt-3">© 2020 Copyright:
      <a href="#">DevUni</a>
    </div>
    <!-- Copyright -->

  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>