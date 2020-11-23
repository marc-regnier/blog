<?php $this->title = "Accueil"; ?>

<?= $this->session->show('add_comment'); ?>

<?= $this->session->show('flag_comment'); ?>

<?= $this->session->show('delete_comment'); ?>

<?= $this->session->show('register'); ?>

<?= $this->session->show('login'); ?>

<?= $this->session->show('logout'); ?>

<?= $this->session->show('delete_account'); ?>

<div class="container ">
    <div class="col-md-12">
        <div class="row">
            <?php

            foreach ($posts as $post) {
            ?>
                <div class="card mb-4 mr-3" style="width: 18rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title"><a href="index.php?p=post&id=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h3>
                        <p>Ecrit par : <?= htmlspecialchars($post->getAuthor()); ?></p>
                        <p><?= htmlspecialchars($post->getCategory()); ?></p>
                        <p class="card-text"><?= htmlspecialchars($post->getContent()); ?></p>
                        <a href="index.php?p=post&id=<?= htmlspecialchars($post->getId()); ?>" class="btn btn-primary">Lire article</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>