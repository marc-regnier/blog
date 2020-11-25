<?php $this->title = 'Admin-Categories'; ?>




<h2 class="text-center">Categorie</h2>

<a class="btn btn-success" href="../public/index.php?p=addCategory">Ajouter</a><br><br>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Slug</td>
        <td>Action</td>
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
                
                <a class="btn btn-danger" href="../public/index.php?p=deleteCategory&id=<?= $category->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>