
<?= $this->session->show('add_post'); ?>

<?= $this->session->show('edit_post'); ?>

<?= $this->session->show('delete_post'); ?>

<?= $this->session->show('add_comment'); ?>

<?= $this->session->show('flag_comment'); ?>

<?= $this->session->show('delete_comment'); ?>

<?php $this->title = "Accueil"; ?>


<div class="row">
    <div class="col-sm-8">
    <a href="../public/index.php?p=addPost">Nouvel article</a>
<?php

    foreach($posts as $post)
    {
        ?>
        <div>
            <h2><a href="index.php?p=post&id=<?= htmlspecialchars($post->getId());?>"><?= htmlspecialchars($post->getTitle());?></a></h2>
            <p><?= htmlspecialchars($post->getContent());?></p>
            <p>Créé le : <?= htmlspecialchars($post->getCreatedAt());?></p>
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