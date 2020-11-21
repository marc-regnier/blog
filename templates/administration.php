<?php $this->title = 'Administration'; ?>

<h1>Mon blog</h1>
<p>En construction</p>

<?= $this->session->show('edit_post'); ?>

<?= $this->session->show('delete_post'); ?>

<?= $this->session->show('unflag_comment'); ?>

<?= $this->session->show('delete_comment'); ?>

<?= $this->session->show('delete_user'); ?>

<?= $this->session->show('edit_cate'); ?>

<h2>Articles</h2>

<table class="table">
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Catégorie</td>
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
            <td><?= htmlspecialchars($post->getAuthor());?></td>
            <td><?= htmlspecialchars($post->getCategory());?></td>
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

<h2>Utilisateurs</h2>

<table class="table">
    <tr>
        <td>Id</td>
        <td>Pseudo</td>
        <td>Date</td>
        <td>Rôle</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($users as $user)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($user->getId());?></td>
            <td><?= htmlspecialchars($user->getPseudo());?></td>
            <td>Créé le : <?= htmlspecialchars($user->getCreatedAt());?></td>
            <td><?= htmlspecialchars($user->getRoles());?></td>
            <td><?php
                if($user->getRoles() != 'admin') {
                ?>
                <a href="../public/index.php?p=deleteUser&id=<?= $user->getId(); ?>">Supprimer</a>
                <?php }
                else {
                    ?>
                Suppression impossible
                <?php
                }
                ?></td>
        </tr>
        <?php
    }
    ?>
</table>

<h2>Categorie</h2>

<a href="../public/index.php?p=addCategory">Ajouter</a>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>slug</td>
    </tr>
    <?php
    foreach ($categories as $category)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($category->getId());?></td>
            <td><?= htmlspecialchars($category->getName());?></td>
            <td><?= htmlspecialchars($category->getSlug());?></td>
            <td>
                
                <a href="../public/index.php?p=deleteCategory&id=<?= $category->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>