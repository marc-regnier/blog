<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <?php
    require '../app/Post.php';
    $post = new Post();
    $posts = $post->getPost($_GET['id']);
    $post = $posts->fetch()
    ?>
    <div>
        <h2><?= htmlspecialchars($post->title);?></h2>
        <p><?= htmlspecialchars($post->content);?></p>
        <p>Créé le : <?= htmlspecialchars($post->createdAt);?></p>
    </div>
    <br>
    <?php
    $posts->closeCursor();
    ?>
    <a href="index.php">Retour à l'accueil</a>
</div>