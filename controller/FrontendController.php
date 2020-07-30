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
    public function register()
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
                $_SESSION['valide'] = "Merci pour votre inscription.";
            } else {
                $_SESSION['error'] = "Champs mal rempli";
            }
        }
        require_once 'views/frontend/userRegister.php';
    }

    /**
     * Affiche la page de connexion
     *
     * @return void
     */
    public function connexion()
    {
        $userManager = new UserManager;

        if (isset($_POST['connexion'])) {
            if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                $pseudoConnexion = htmlspecialchars($_POST['pseudo']);
                $passConnexion = htmlspecialchars($_POST['pass']);

                $setUser = new User([
                    'pseudo' => $pseudoConnexion,
                    'pass' => $passConnexion
                ]);
                $user = $userManager->findByPseudo($setUser);

                $isPassCorrect = password_verify($passConnexion, $user->getPass());

                if (!$user) {
                    $_SESSION['error'] = "Mauvais identifiant ou mot de passe ";
                } else {
                    if ($isPassCorrect) {
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['pseudo'] = $user->getPseudo();
                        $_SESSION['roles'] = $user->getRoles();
                        $_SESSION['valide'] = 'Bonjour ' . $_SESSION['pseudo'];
                    } else {
                        $_SESSION['error'] = 'Mauvais identifiant ou mot de passe';
                    }
                }
            } else {
                $_SESSION['error'] = 'Veuillez remplir les champs requis.';
            }
        }

        require_once 'views/frontend/signUp.php';
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
                    header('Location: index.php?action=single&chapter_id=' . $_GET['chapter_id']);
                    $_SESSION['valide'] = 'Merci pour votre commentaire';
                } else {
                    $_SESSION['error'] = 'Champs invalides';
                }
            }

            // Signale un commentaire
            if (isset($_POST['report'])) {
                $commentManager->report($_POST['report']);
                unset($_SESSION['error']);
                $_SESSION['valide'] = 'Le message a bien été signalé';
            }
            require_once 'views/frontend/single.php';
        } else {
            $_SESSION['error'] = "L'URL est invalide";
            header('location: index.php?action=home');
        }
    }

    /**
     * Affiche la biographie de Jean 
     *
     * @return void
     */
    public function biography()
    {
        require_once 'views/frontend/biography.php';
    }
}
