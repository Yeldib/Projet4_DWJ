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

    /**
     * Affiche la page d'inscription
     *
     * @return void
     */
    public function userRegister()
    {
        $userManager = new UserManager;

        if (!empty($_POST)) {
            if (
                isset($_POST['pseudo']) && !empty($_POST['pseudo'])
                && isset($_POST['pass']) && !empty($_POST['pass'])
                && isset($_POST['email']) && !empty($_POST['email'])
            ) {
                //On nettoie les données envoyées
                $userPseudo = htmlspecialchars($_POST['pseudo']);
                $email = htmlspecialchars($_POST['email']);

                $userPass = $_POST['pass'];
                $passHash = password_hash($userPass, PASSWORD_DEFAULT);

                $user = new User([
                    'pseudo' => $userPseudo,
                    'pass' => $passHash,
                    'email' => $email
                ]);
                $userManager->add($user);
            } else {
                echo "Champs mal rempli";
            }
        }
        require_once 'views/frontend/userRegister.php';
    }

    // Affiche un chapitre avec ces commentaires
    public function single()
    {
        if (!empty($_GET['chapter_id'])) {

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

                    // message de validation
                    header('location: index.php?action=single&chapter_id=' . $_GET['chapter_id']);
                } else {
                    // msg erreur
                }
            }

            // Signale un commentaire
            if (isset($_POST['report'])) {

                $commentManager->report($_POST['report']);
                // $session->setFlash('votre message a bien été signalé', 'success');
                // $session->flash();
            }

            require_once 'views/frontend/single.php';
        } else {
            header('location: index.php?action=home');
        }
    }
}
