<?php

$post = $db->prepare('SELECT * FROM post WHERE  id= ?', [$_GET['id']], 'App\Table\Post', true);

?>


<h1><?= $post->title ?></h1>

<p><?= $post->content ?></p>