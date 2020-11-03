<ul>

    <?php

    foreach (App\Table\Post::getLast() as $post) : ?>

        <?= var_dump($post->categorie) ?>

        <h2><a href="<?= $post->url; ?>"><?= $post->title ?></a></h2>

        <p><?= $post->extract; ?></p>


    <?php endforeach; ?>


</ul>