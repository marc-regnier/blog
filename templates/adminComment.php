<?php $this->title = 'Administration'; ?>

<?= $this->session->show('unflag_comment'); ?>

<?= $this->session->show('delete_comment'); ?>



<?= $this->session->show('edit_cate'); ?>




<h2 class="text-center">Commentaires signalés</h2>

<table class="table">
    <tr>
        <td>Id</td>
        <td>Pseudo</td>
        <td>Message</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($comment->getId());?></td>
            <td><?= htmlspecialchars($comment->getPseudo());?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
            <td><a href="../public/index.php?p=unflagComment&id=<?= $comment->getId(); ?>">Désignaler le commentaire</a>
                <a href="../public/index.php?p=deleteComment&id=<?= $comment->getId(); ?>">Supprimer le commentaire</a></td>
        </tr>
        <?php
    }
    ?>
</table>



