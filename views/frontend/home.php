<?php ob_start(); ?>
<?php $metaDescription = "Bienvenue sur le blog de l'écrivain Jean Forteroche" ?>
<?php $title = "Page d'accueil du blog de Jean Forteroche" ?>

<!-- Hero -->
<div class="text-white bg-image-home">
    <div id="home-title" class="col">
        <h1>Billet simple pour l'Alaska </h1>
        <em>de Jean Forteroche</em>
    </div>
</div>

<h2 id="h2-title">Derniers chapitres publiés</h2>
<!-- Affiche tous les chapitres -->
<div class="row mb-2">
    <?php foreach ($chapters as $chapter) { ?>
        <div class="col-md-6 mr-0">
            <div id="list-chapters-home" class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 mr-4 ml-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0"><?= $chapter->getTitle() ?></h3>
                    <div class="mb-1 text-muted"><?= $chapter->getCreatedAt() ?></div>
                    <p class="card-text mb-auto"><?= substr($chapter->getContent(), 0, 150) ?>... </p>
                    <a href="index.php?action=single&chapter_id=<?= $chapter->getId() ?>" class="text-muted"><i class="far fa-comment-alt mr-2"></i> Lire la suite... </a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <figure class="pos-relative-figure mb-0">
                        <img class="bd-placeholder-img " width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" src="public/images/papier.jpg">
                        <figcaption id="position-num-chapter"><?= $chapter->getNumChapter() ?></figcaption>
                    </figure>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/frontend/template.php'; ?>