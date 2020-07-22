<?php
session_start();

require_once 'model/ChapterManager.php';

$chapterManager = new ChapterManager;
$chapters = $chapterManager->getList();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Blog</title>
</head>

<body>
    <!-- Navbar -->
    <div class="container">
        <header>
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    <a class="p-2 text-muted" href="index.php">Accueil</a>
                    <a class="p-2 text-muted" href="#">À propos de l'auteur</a>
                </nav>
            </div>
        </header>

        <!-- Hero -->
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark bg-image">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">Billet simple pour l'Alaska de Jean Forteroche</h1>
            </div>
        </div>

        <div class="row mb-2">
            <!-- Affiche tous les chapitres -->
            <?php foreach ($chapters as $chapter) { ?>
                <div class="col-md-6">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary"><?= $chapter->getNumChapter() ?></strong>
                            <h3 class="mb-0"><?= $chapter->getTitle() ?></h3>
                            <div class="mb-1 text-muted"><?= $chapter->getCreatedAt() ?></div>
                            <p class="card-text mb-auto"><?= $chapter->getContent() ?></p>
                            <a href="views/frontend/single.php?chapter_id=<?= $chapter->getId() ?>" class="stretched-link">Lire la suite...</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <figure class="pos-relative-figure">
                                <img class="bd-placeholder-img " width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail" src="public/images/papier.jpg">
                                <figcaption class="pos-absolute-figcaption"><?= $chapter->getNumChapter() ?></figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>

</html>