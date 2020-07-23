<?php
class FrontendController
{
    /**
     * Affiche la page d'accueil du site
     *
     * @return void
     */
    public function home()
    {
        $chapterManager = new ChapterManager;
        $chapters = $chapterManager->getList();

        require_once 'views/frontend/home.php';
    }

    // Affiche un chapitre avec ces commentaires
    public function single()
    {
        $chapterManager = new ChapterManager;
        $chapter = $chapterManager->get($_GET['chapter_id']);

        $commentManager = new CommentManager;
        $comments = $commentManager->getById($_GET['chapter_id']);

        // Insertion d'un commentaire
        if (!empty($_POST)) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {

                $chapterId = htmlspecialchars($_GET['chapter_id']);
                $insertAuthor = htmlspecialchars($_POST['author']);
                $insertComment = nl2br(htmlspecialchars($_POST['comment']));

                $insert = new Comment([
                    'chapter_id'    => $chapterId,
                    'author'        => $insertAuthor,
                    'comment'       => $insertComment
                ]);
                $commentManager->insert($insert);
                header('location: index.php?action=single&chapter_id=' . $_GET['chapter_id']);
            } else {
                // message d'erreur;
            }
        }

        // Signale un commentaire
        if (
            isset($_POST['report'])
            && !empty($_POST['report'])
            && (int) $_POST['report']
        ) {

            $commentManager->report($_POST['report']);
            // echo "signalé";
        }
        require_once 'views/frontend/single.php';
    }
}
