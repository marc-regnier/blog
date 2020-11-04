<div class="row">
    <div class="col-sm-8">
        <?php

        foreach (\App\Table\Post::getLast() as $post): ?>

            <h2><a href="<?= $post->url; ?>"><?= $post->title ?></a></h2>

            <p><?= $post->extract; ?></p>


        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">

        <ul>
            <?php
            
            foreach (\App\Table\Category::all() as $categorie): ?>

                <li><a href="'<?= $categorie->url; ?>'"><?= $categorie->name; ?></li>

            <?php endforeach; ?>

        </ul>

    </div>

</div>