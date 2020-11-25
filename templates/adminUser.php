<?php $this->title = 'Admin-User'; ?>


<?= $this->session->show('delete_user'); ?>



<h2 class="text-center">Utilisateurs</h2>

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
                <a class="btn btn-danger" href="../public/index.php?p=deleteUser&id=<?= $user->getId(); ?>">Supprimer</a>
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