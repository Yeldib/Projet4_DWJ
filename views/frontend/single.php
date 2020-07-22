<?php

session_start();

require_once '../../model/ChapterManager.php';
require_once '../../model/CommentManager.php';
require_once '../../model/Comment.php';

$chapterManager = new ChapterManager;
$chapter = $chapterManager->get($_GET['chapter_id']);

$commentManager = new CommentManager;
$comments = $commentManager->getById($_GET['chapter_id']);

$commentManager->insert();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Chaptitre <?= $chapter->getTitle() ?></title>
</head>

<body>

    <div class="container">

        <!-- NAVBAR -->
        <header>
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    <a class="p-2 text-muted" href="../../index.php">Accueil</a>
                    <a class="p-2 text-muted" href="#">À propos de l'auteur</a>
                </nav>
            </div>
        </header>

        <!-- Affiche un article -->
        <div class="row mb-2">
            <?php if (!empty($chapter)) { ?>
                <div class="col">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary"><?= $chapter->getNumChapter() ?></strong>
                            <h3 class="mb-0"><?= $chapter->getTitle() ?></h3>
                            <div class="mb-1 text-muted"><?= $chapter->getCreatedAt() ?></div>
                            <p class="card-text mb-auto"><?= $chapter->getContent() ?></p>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <?= $_SESSION['error'] = "URL INVALIDE";
                header('Location: ../index.php');
                ?>
            <?php } ?>
        </div>

        <!-- Formulaire commentaires -->
        <div class="row">
            <form method="POST">
                <div class="form-group">
                    <p>Votre avis m'intéresse, n'hésitez pas à commenter.</p>
                    <p>
                        <label for="author">Pseudo :</label>
                        <input type="text" class="form-control" name="author">
                    </p>
                    <p>
                        <label for="comment">Votre commentaire :</label>
                        <textarea name="comment" class="form-control"></textarea>
                    </p>
                    <p>
                        <input type="submit" class="btn btn-primary" value="Poster votre message"><br />
                    </p>
                </div>
            </form>
        </div>

        <!-- affiche la liste des commentaires d'un chapitre -->
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <?php if (count($comments) === 0) : ?>
                    <p>Il n'y a pas de commentaires ... SOYEZ LE PREMIER !</p>
                <?php else : ?>
                    <em>Il y a déjà <?= count($comments) ?> réactions : </em>
                    <?php foreach ($comments as $comment) : ?>
                        <p>
                            <strong>Commentaire de <?= $comment->getAuthor() ?></strong>
                            <small>Le <?= $comment->getCreatedAt() ?></small>

                        </p>
                        <blockquote>
                            <em><?= $comment->getComment() ?></em><br>
                        </blockquote>
                        <a href="#">signaler</a>
                    <?php endforeach ?>
                <?php endif ?>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>

</html>