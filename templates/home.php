
<?php $this->title = "Accueil"; ?>

<div class="row">
    <div class="col-sm-8">
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