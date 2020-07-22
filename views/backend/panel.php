<?php
require_once '../../model/CommentManager.php';
require_once '../../model/Comment.php';
require_once '../../model/ChapterManager.php';
require_once '../../model/Chapter.php';

$commentManager = new CommentManager;
$comments = $commentManager->getList();

$chapterManager = new ChapterManager;
$chapters = $chapterManager->getList();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Page de modération des commentaires</title>
</head>

<body>
    <div class="container">
        <h1>Page de modération</h1>

        <h2>Liste des commentaires</h2>

        <section class="container">
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <th>Pseudo</th>
                            <th>Commentaires</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php foreach ($comments as $comment) { ?>
                                <tr>
                                    <td><?= $comment->getAuthor() ?></td>
                                    <td><?= $comment->getComment() ?></td>
                                    <td></td>
                                </tr>
                        </tbody>
                    <?php } ?>
                    </table>
                </div>
            </div>
        </section>

        <h2>Liste des chapitres</h2>

        <section class="container">
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <th>Numéro du chapitre</th>
                            <th>Titre</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php foreach ($chapters as $chapter) { ?>
                                <tr>
                                    <td><?= $chapter->getNumChapter() ?></td>
                                    <td><?= $chapter->getTitle() ?></td>
                                    <td>
                                        <a href="../frontend/single.php?chapter_id=<?= $chapter->getId() ?>">Voir</a> |
                                        <a href="updateChapter?chapter_id=<?= $chapter->getId() ?>">Modifier</a> |
                                        <a href="deleteChapter.php?chapter_id=<?= $chapter->getId() ?>">Supprimer</a>
                                    </td>
                                </tr>
                        </tbody>
                    <?php } ?>
                    </table>
                    <a href="createChapter.php" class="btn btn-primary">Rédiger un chapitre</a>
                </div>
            </div>
        </section>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>