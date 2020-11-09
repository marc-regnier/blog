
<div class="row">
    <div class="col-sm-8">
<?php
    
    require '../app/Post.php';
    $post = new Post();
    $posts = $post->getPosts();
    while($post = $posts->fetch())
    {
        ?>
        <div>
            <h2><a href="index.php?p=post&id=<?= htmlspecialchars($post->id);?>"><?= htmlspecialchars($post->title);?></a></h2>
            <p><?= htmlspecialchars($post->content);?></p>
            <p>Créé le : <?= htmlspecialchars($post->createdAt);?></p>
        </div>
        <br>
        <?php
    }
    $posts->closeCursor();
    ?>
</div>


    </div>
       
    <div class="col-sm-4">

        <ul>

                <li><a href=""></a></li>

        </ul>

    </div>

</div>