<?php $this->title = 'Mon profil'; ?>
<?= $this->session->show('update_password'); ?>


<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1>Espace Membre</h1>
            <h2><?= $this->session->get('pseudo'); ?></h2>
            <a class="btn btn-primary btn-lg active" role="button" href="../public/index.php?p=updatePassword">Modifier son mot de passe</a>
            <a class="btn btn-danger btn-lg active" href="../public/index.php?p=deleteAccount">Supprimer mon compte</a>
        </div>
    </div>
</div>
<br>