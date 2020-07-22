<?php
require_once '../../model/Chapter.php';
require_once '../../model/ChapterManager.php';

// Ajout d'un chapitre avec des vérifications
if (!empty($_POST)) {

    if (
        isset($_POST['num_chapter']) && !empty($_POST['num_chapter'])
        && isset($_POST['title']) && !empty($_POST['title'])
        && isset($_POST['content']) && !empty($_POST['content'])
    ) {

        //On nettoie les données envoyées
        $numChapter = strip_tags($_POST['num_chapter']);
        $chapterTitle = strip_tags($_POST['title']);
        $chapterContent = strip_tags($_POST['content']);

        $chapter = new Chapter([
            'num_chapter'   => $numChapter,
            'title'         => $chapterTitle,
            'content'       => $chapterContent
        ]);
        $chapterManager = new ChapterManager;
        $chapterManager->add($chapter);


        // $_SESSION['message'] = "Chapitre publié";
        header('Location: ../../index.php');
    } else {
        // $_SESSION['error'] = "Champs incomplet";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/th66f2zf09ao7uqyjdg67jo3iq5bys29vb81bw089m2g993q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Mode édition</h1>

                <form method="post">
                    <div class="form-group">
                        <p><label for="num-chapitre">Numéro du chapitre</label>
                            <input type="text" name="num_chapter" placeholder="Chapitre 1" class="form-control"></p>
                    </div>
                    <div class="form-group">
                        <p><label for="titre">Titre du chapitre</label>
                            <input type="text" name="title" class="form-control"></p>
                    </div>
                    <div class="form-group">
                        <textarea id="mytextarea" name="content" placeholder="Contenu...."></textarea>
                    </div>

                    <p><input type="submit" name="sendChapter" value="Publication" class="btn btn-primary"></p>
                </form>
            </div>
        </div>
    </div>

    <script src="../../public/js/tinymce.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>