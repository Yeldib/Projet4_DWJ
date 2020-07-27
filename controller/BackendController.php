<?php

class BackendController
{
    /**
     * Affiche la page d'administration
     *
     */
    public function panel()
    {
        // Pour afficher cette page il faut vérifier si l'utilisateur est ADMIN
        if (isset($_SESSION['id']) && $_SESSION['roles'] === 'ROLE_ADMIN') {

            $commentManager = new CommentManager;
            $comments = $commentManager->getList();

            $chapterManager = new ChapterManager;
            $chapters = $chapterManager->getList();

            // Suppression d'un chapitre
            if (
                isset($_GET['chapter_id'])
                && !empty($_GET['chapter_id'])
                && (int) $_GET['chapter_id']
            ) {

                $chapterManager->delete($_GET['chapter_id']);
            }

            // Suppression d'un commentaire
            if (
                isset($_GET['id'])
                && !empty($_GET['id'])
                && (int) $_GET['id']
            ) {

                $commentManager->delete($_GET['id']);
            }
        } else {
            echo "Page non autorisée";
            header('Location: index.php?action=home');
        }


        require_once 'views\backend\panel.php';
    }

    /**
     * Affiche la page pour ajouter un nouveau chapitre
     */
    public function create()
    {

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
                // Chapitre enregistré
            } else {
                // Champs mal rempli
            }
        }

        require_once 'views/backend/createChapter.php';
    }

    /**
     * Affiche la page de modification d'un chapitre
     */
    public function update()
    {
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
                    header('Location: index.php?action=home');
                } else {
                    $_SESSION['error'] = "Champs incomplet";
                }
            }
        } else {
            $_SESSION['erreur'] = "URL INVALIDE";
            header('Location: index.php?action=home');
        }

        require_once 'views/backend/updateChapter.php';
    }
}
