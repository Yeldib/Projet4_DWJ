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

                if (empty($userManager->isPseudoExist($_POST['pseudo']))) {
                    if (empty($userManager->isEmailExist($_POST['email']))) {
                        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$#', $userPass)) {
                            $user = new User([
                                'pseudo' => $userPseudo,
                                'pass' => $passHash,
                                'email' => $email
                            ]);
                            $userManager->add($user);


                            // Email lors de l'inscription
                            $headers = "MIME-Version: 1.0\r\n";
                            $dest = $email;
                            $subject = "Inscription sur le blog de Jean Forteroche";
                            $headers .= 'From:"eldibaliya@gmail.com"' . "\n";
                            $headers .= 'Content-Type:text/html; charset="uft-8"' . "\n";
                            $headers .= 'Content-Transfer-Encoding: 8bit';

                            $message = "
                    <html>
                        <body>
                        <img src='' alt=''>
                            <div align='left'>
                                Bonjour $userPseudo,<br/><br/>
                                Merci pour votre inscription.<br/>
                                J'éspère sincèrement que vous apprécierez mon livre.<br/>
                                N'hésitez pas à me contacter ou laisser des commentaires directement sur le blog.<br/><br/>
                                À bientôt,<br/>
                                Jean Forteroche.
                            </div>
                        </body>
                    </html>
                    ";

                            if (mail($dest, $subject, $message, $headers)) {
                                $_SESSION['valide'] = "Merci pour votre inscription. Un email vous a été envoyé.";
                                header('Location: index.php?action=connexion');
                                exit();
                            } else {
                                $_SESSION['error'] = "Echec de l'envoi";
                            };
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
                        header('Location: index.php?action=home');
                        exit();
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
                    $_SESSION['valide'] = 'Merci pour votre commentaire';
                    header('Location: index.php?action=single&chapter_id=' . $_GET['chapter_id']);
                    exit();
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
            exit();
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

    /**
     * Affiche la page pour contacter le dev
     *
     * @return void
     */
    public function contactDev()
    {
        $formContact = new Form($_POST);

        if (isset($_POST['mailform'])) {
            if (
                !empty($_POST['fname']) &&
                !empty($_POST['lname']) &&
                !empty($_POST['email']) &&
                !empty($_POST['phone']) &&
                !empty($_POST['message'])
            ) {

                // nettoyer l'envoie des variables
                $fnameContact = htmlspecialchars($_POST['fname']);
                $lnameContact = htmlspecialchars($_POST['lname']);
                $emailContact = htmlspecialchars($_POST['email']);
                $phoneContact = htmlspecialchars($_POST['phone']);
                $messageContact = htmlspecialchars($_POST['message']);

                $headers = "MIME-Version: 1.0\r\n";
                $dest = "eldibyasr27140@gmail.com";
                $subject = "Message formulaire de contact WEBMASTER (blog JForteroche)";
                $headers .= 'From:"eldibaliya@gmail.com"' . "\n";
                $headers .= 'Content-Type:text/html; charset="uft-8"' . "\n";
                $headers .= 'Content-Transfer-Encoding: 8bit';

                $message = "
        <html>
            <body>
                <div align='left'>
                    Message de $fnameContact $lnameContact : <br/><br/>
                    $messageContact <br/><br/>
                    Email: $emailContact <br/>
                    Tél: $phoneContact <br/>
                </div>
            </body>
        </html>
        ";

                if (mail($dest, $subject, $message, $headers)) {
                    $_SESSION['valide'] = "Votre message a été envoyé avec succès.";
                } else {
                    $_SESSION['error'] = "Echec de l'envoi";
                };
            } else {
                $_SESSION['error'] = "Champs requis manquants";
            }
        }
        require_once 'views/frontend/contactDev.php';
    }

    public function contactAuthor()
    {
        require_once 'views/frontend/contactAuthor.php';
    }
}
