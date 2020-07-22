<?php
session_start();

require_once '../../model/ChapterManager.php';

// On vérifie si le chapitre envoyé dans l'URL existe, qu'il n'est pas vide et que se soit un entier
if (
    isset($_GET['chapter_id'])
    && !empty($_GET['chapter_id'])
    && (int) $_GET['chapter_id']
) {

    // On instancie le modèle et on appel la méthode get 
    $chapterManager = new ChapterManager;
    $chapter = $chapterManager->get($_GET['chapter_id']);

    // On vérifie que les paramètres envoyés ne soient pas vide
    if (!empty($_POST)) {

        // On vérifie chaque paramètres existent et ne soient pas vide
        if (
            isset($_POST['id']) && !empty($_POST['id'])
            && isset($_POST['num_chapter']) && !empty($_POST['num_chapter'])
            && isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['content']) && !empty($_POST['content'])
        ) {

            //On nettoie les données envoyées
            $chapterId = strip_tags($_POST['id']);
            $numChapter = strip_tags($_POST['num_chapter']);
            $chapterTitle = strip_tags($_POST['title']);
            $chapterContent = strip_tags($_POST['content']);

            $update = new Chapter([
                'id'            => $chapterId,
                'num_chapter'   => $numChapter,
                'title'         => $chapterTitle,
                'content'       => $chapterContent
            ]);
            $chapterManager->update($update);

            $_SESSION['message'] = "Chapitre modifié";
            header('Location: ../../index.php');
        } else {
            $_SESSION['error'] = "Champs incomplet";
        }
    }
} else {
    $_SESSION['erreur'] = "URL INVALIDE";
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification chapitre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/th66f2zf09ao7uqyjdg67jo3iq5bys29vb81bw089m2g993q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>

    <h1>Modification du <?= $chapter->getNumChapter() ?></h1>

    <form method="post">
        <div class="form-group">
            <p><label for="num-chapitre">N° chapitre</label>
                <input type="text" name="num_chapter" class="form-control" value="<?= $chapter->getNumChapter() ?>"></p>
        </div>
        <div class="form-group">
            <p><label for="titre">Titre</label>
                <input type="text" name="title" class="form-control" value="<?= $chapter->getTitle() ?>"></p>
        </div>
        <div class="form-group">
            <textarea id="mytextarea" name="content"><?= $chapter->getContent() ?></textarea>
        </div>

        <p><input type="submit" name="envoyer-contenu" value="Modifier" class="btn btn-primary"></p>
        <input type="hidden" name="id" value="<?= $chapter->getId() ?>">
    </form>

    <script src="../../public/js/tinymce.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>