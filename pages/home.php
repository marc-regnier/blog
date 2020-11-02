<ul>

    <?php

    foreach ($db->query('SELECT * FROM post', 'App\Table\Post') as $post) : ?>

        <h2><a href="<?= $post->url; ?>"><?= $post->title ?></a></h2>

        <p><?= $post->extract; ?></p>


    <?php endforeach; ?>


</ul>