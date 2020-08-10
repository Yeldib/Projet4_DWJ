<?php
class FrontendController
{

    /**
     * Affiche une page d'erreur 404
     */
    public function error404()
    {
        require_once 'views/frontend/error404.php';
    }

    /**
     * Affiche la page d'accueil du site
     *
     * @return void
     */
    public function home()
    {
        $chapterManager = new ChapterManager;
        $chapters = $chapterManager->getList();
        $commentManager = new CommentManager;

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
        $emailManager = new Email;
        $formContact = new Form($_POST);

        if (!empty($_POST)) {
            if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['email'])) {
                if (empty($userManager->isPseudoExist($_POST['pseudo']))) {
                    if (empty($userManager->isEmailExist($_POST['email']))) {
                        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$#', $_POST['pass'])) {
                            if (preg_match('#^[a-zA-Z0-9_]{4,15}$#', $_POST['pseudo'])) {
                                $passHash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                                $userPseudo = strip_tags($_POST['pseudo']);
                                $userMail = strip_tags($_POST['email']);
                                $user = new User([
                                    'pseudo' => $userPseudo,
                                    'pass' => $passHash,
                                    'email' => $userMail
                                ]);
                                $userManager->add($user);
                                $emailManager->sendMailRegister($_POST['email'], $_POST['pseudo']);
                            } else {
                                $_SESSION['error'] = "Pseudonyme non conforme";
                            }
                        } else {
                            $_SESSION['error'] = "Mot de passe non conforme";
                        }
                    } else {
                        $_SESSION['error'] = "Cet email est déjà utilisé";
                    }
                } else {
                    $_SESSION['error'] = "Ce pseudonyme est déjà utilisé";
                }
            } else {
                switch (true) {
                    case empty($_POST['pseudo']):
                        $_SESSION['error'] = "Pseudonyme requis pour vous inscrire.";
                        break;
                    case empty($_POST['email']):
                        $_SESSION['error'] = "Email non renseigné";
                        break;
                    case empty($_POST['pass']):
                        $_SESSION['error'] = "Mot de passe non renseigné";
                        break;
                }
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
        $chapterManager = new ChapterManager;
        $chapters = $chapterManager->getList();

        $formContact = new Form($_POST);
        if (!empty($_POST)) {
            $validation = true;

            if (empty($_POST['pseudo']) || empty($_POST['pass'])) {
                $validation = false;
                $_SESSION['error'] = "Veuillez remplir les champs requis.";
            }

            if ($validation) {
                $userManager = new UserManager();
                $user = $userManager->isPseudoExist($_POST['pseudo']);

                if (!$user) {
                    $_SESSION['error'] = "Mauvais identifiant ou mot de passe";
                } else {
                    $isPassCorrect = password_verify($_POST['pass'], $user->getPass());

                    if ($isPassCorrect) {
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['pseudo'] = $user->getPseudo();
                        $_SESSION['roles'] = $user->getRoles();

                        $_SESSION['valide'] = 'Bonjour ' . $_SESSION['pseudo'];
                        header('Location: index.php?action=home');
                        exit();
                    } else {
                        $_SESSION['error'] = 'Mauvais identifiant ou mot de passe';
                    }
                }
            }
        }

        require_once 'views/frontend/signUp.php';
    }

    // Affiche un chapitre avec ces commentaires
    public function single()
    {
        $formContact = new Form($_POST);

        if (empty($_GET['chapter_id'])) {
            $_SESSION['error'] = "URL invalide";
            return header('Location: index.php?action=home');
        }

        $chapterManager = new ChapterManager;
        if (!$chapter = $chapterManager->get($_GET['chapter_id'])) {
            $_SESSION['error'] = "Page introuvable";
            return header('Location: index.php?action=home');
        }

        $commentManager = new CommentManager;
        $comments = $commentManager->getById($_GET['chapter_id']);

        $chapters = $chapterManager->getList();
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
                $_SESSION['valide'] = 'Merci pour votre commentaire';
                return header('Location: index.php?action=single&chapter_id=' . $_GET['chapter_id']);
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
    }

    /**
     * Affiche la biographie de Jean 
     *
     * @return void
     */
    public function biography()
    {
        $chapterManager = new ChapterManager;
        $chapters = $chapterManager->getList();

        require_once 'views/frontend/biography.php';
    }

    /**
     * Affiche la page pour contacter le dev
     *
     * @return void
     */
    public function contactDev()
    {
        $chapterManager = new ChapterManager;
        $chapters = $chapterManager->getList();
        $emailManager = new Email;
        $formContact = new Form($_POST);
        if (isset($_POST['mailform'])) {
            if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
                $emailManager->sendMailToDev($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['phone'], $_POST['message']);
            } else {
                $_SESSION['error'] = "Champs requis manquants";
            }
        }
        require_once 'views/frontend/contactDev.php';
    }

    public function contactAuthor()
    {
        $chapterManager = new ChapterManager;
        $chapters = $chapterManager->getList();
        $formContact = new Form($_POST);
        require_once 'views/frontend/contactAuthor.php';
    }
}
