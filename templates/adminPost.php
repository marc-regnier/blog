<?php $this->title = 'Admin-Post'; ?>

<?= $this->session->show('edit_post'); ?>

<?= $this->session->show('delete_post'); ?>



<h2 class="text-center">Articles</h2>

<div class="container">

    <a class="btn btn-success" href="../public/index.php?p=addPost">Ajouter un article</a><br><br>

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
        foreach ($posts as $post) {
        ?>
            <tr>
                <td><?= htmlspecialchars($post->getId()); ?></td>
                <td><a href="../public/index.php?p=post&id=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></td>
                <td><?= substr(htmlspecialchars($post->getContent()), 0, 150); ?></td>
                <td><?= htmlspecialchars($post->getAuthor()); ?></td>
                <td><?= htmlspecialchars($post->getCategory()); ?></td>
                <td>Créé le : <?= htmlspecialchars($post->getCreatedAt()); ?></td>
                <td>
                    <a class="btn btn-warning" href="../public/index.php?p=editPost&id=<?= $post->getId(); ?>">Modifier</a>
                    <a class="btn btn-danger" href="../public/index.php?p=deletePost&id=<?= $post->getId(); ?>">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>