<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <div>
    <h2><?= htmlspecialchars($posts->getTitle());?></h2>
        <p><?= htmlspecialchars($posts->getContent());?></p>
        <p>Créé le : <?= htmlspecialchars($posts->getCreatedAt());?></p>
    </div>
    <br>
    <a href="index.php">Retour à l'accueil</a>
</div>

<div id="comments" class="text-left" style="margin-left: 50px">
    <h3>Commentaires</h3>
    <?php
    
    foreach ($comments as $comment)
    {
        ?>
        <h4></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
        <?php
    }
    ?>
</div>