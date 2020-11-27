<?php $this->title = "Accueil"; ?>

<?= $this->session->show('add_comment'); ?>

<?= $this->session->show('flag_comment'); ?>

<?= $this->session->show('delete_comment'); ?>

<?= $this->session->show('register'); ?>

<?= $this->session->show('login'); ?>

<?= $this->session->show('logout'); ?>

<?= $this->session->show('delete_account'); ?>

<div class="container ">
    <div class="col-md-12">
        <div class="row">
            <?php

            foreach ($posts as $post) {
            ?>
                <div class="card mb-4 mr-3" style="width: 300px;">
                    <div class="view overlay">
                        <img style="width: 300px;" class="card-img-top" src="../uploads/<?= htmlspecialchars($post->getImage()); ?>" alt="<?= htmlspecialchars($post->getImage()); ?>">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <div class="card-body">
                        <h3 class="card-title"><a href="index.php?p=post&id=<?= htmlspecialchars($post->getId()); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h3>
                        <p>Ecrit par : <?= htmlspecialchars($post->getAuthor()); ?></p>
                        <p><?= htmlspecialchars($post->getCategory()); ?></p>
                        <p class="card-text"><?= htmlspecialchars(substr($post->getContent(), 50)); ?> ...</p>
                        <a href="index.php?p=post&id=<?= htmlspecialchars($post->getId()); ?>" class="btn btn-primary">Lire article</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
       <!-- <nav>
            <ul class="pagination">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="./?p=post&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="./?p=post&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="./?p=post&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav> -->
    </div>
</div>