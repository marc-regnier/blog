<?php $this->title = 'Administration'; ?>

<h1>Mon blog</h1>
<p>En construction</p>

<?= $this->session->show('add_post'); ?>

<?= $this->session->show('edit_post'); ?>

<?= $this->session->show('delete_post'); ?>

<?= $this->session->show('unflag_comment'); ?>

<h2>Articles</h2>

<table>
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($posts as $post)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($post->getId());?></td>
            <td><a href="../public/index.php?p=post&id=<?= htmlspecialchars($post->getId());?>"><?= htmlspecialchars($post->getTitle());?></a></td>
            <td><?= substr(htmlspecialchars($post->getContent()), 0, 150);?></td>
            <td><?= htmlspecialchars($post->getUserId());?></td>
            <td>Créé le : <?= htmlspecialchars($post->getCreatedAt());?></td>
            <td>
                <a href="../public/index.php?p=editPost&id=<?= $post->getId(); ?>">Modifier</a>
                <a href="../public/index.php?p=deletePost&id=<?= $post->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>


<h2>Commentaires signalés</h2>

<table>
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
            <td><a href="../public/index.php?route=unflagComment&id=<?= $comment->getId(); ?>">Désignaler le commentaire</a>
                <a href="../public/index.php?route=deleteComment&id=<?= $comment->getId(); ?>">Supprimer le commentaire</a></td>
        </tr>
        <?php
    }
    ?>
</table>

<h2>Utilisateurs</h2>