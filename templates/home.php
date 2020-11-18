<?php $this->title = "Accueil"; ?>

<?= $this->session->show('add_comment'); ?>

<?= $this->session->show('flag_comment'); ?>

<?= $this->session->show('delete_comment'); ?>

<?= $this->session->show('register'); ?>

<?= $this->session->show('login'); ?>

<?= $this->session->show('logout'); ?>

<?= $this->session->show('delete_account'); ?>

<div class="row">
    <div class="col-sm-8">
        <?php

        foreach ($posts as $post) {
        ?>
            <div>
                <h2><a href="index.php?p=post&id=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h2>
                <p><?= htmlspecialchars($post->getAuthor()); ?></p>
                <p><?= htmlspecialchars($post->getCategory()); ?></p>
                <p><?= htmlspecialchars($post->getContent()); ?></p>
                <p>Créé le : <?= htmlspecialchars($post->getCreatedAt()); ?></p>
            </div>
            <br>
        <?php
        }
        ?>
    </div>


</div>

<div class="col-sm-4">

    <ul>

        <li><a href=""></a></li>

    </ul>

</div>

</div>