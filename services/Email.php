<?php

class Email
{
    /**
     * Envoie un email de bienvenue lors de l'inscription
     * @param [type] $email
     * @param [type] $userPseudo
     */
    public function sendMailRegister($email, $userPseudo)
    {
        $headers = "MIME-Version: 1.0\r\n";
        $dest = $email;
        $subject = "Inscription sur le blog de Jean Forteroche";
        $headers  = "Reply-to:" . stripslashes(htmlentities($email)) . "\n";
        $headers .= 'Content-Type:text/html; charset="uft-8"' . "\n";
        $headers .= 'Content-Transfer-Encoding: 8bit';
        $message = "
            <html>
            <body>
            <figure>
            <div>
                <img src='https://cdn.pixabay.com/photo/2016/07/31/16/24/banner-1559400_960_720.jpg' style='border-radius: 25px;
                width: 270px;
                height: 100px;' alt='banniere'>
                <p style='
                color: black;
                font-family: sans-serif;
                font-size: 1.3rem;
                '>Bienvenue sur mon blog !</p>
            </div>
            <figcaption style='color: black;
            font-family: sans-serif;
            text-align: start;
            width: 214px;
            margin-left: 25px;'>
                Bonjour $userPseudo,<br /><br />
                Merci pour votre inscription.<br />
                J'éspère sincèrement que vous apprécierez mon livre.<br />
                N'hésitez pas à me contacter ou laisser des commentaires directement sur le blog.<br /><br />
                À bientôt,<br />
                Jean Forteroche.
            </figcaption>
        </figure>
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
    }

    /**
     * Envoie un email au développeur via le formulaire de contact
     *
     * @param [type] $fnameContact
     * @param [type] $lnameContact
     * @param [type] $emailContact
     * @param [type] $phoneContact
     * @param [type] $messageContact
     */
    public function sendMailToDev($fnameContact, $lnameContact, $emailContact, $phoneContact, $messageContact)
    {
        $fnameContact = htmlspecialchars($_POST['fname']);
        $lnameContact = htmlspecialchars($_POST['lname']);
        $emailContact = htmlspecialchars($_POST['email']);
        $phoneContact = htmlspecialchars($_POST['phone']);
        $messageContact = htmlspecialchars($_POST['message']);

        $headers = "MIME-Version: 1.0\r\n";
        $dest = "eldibyasr27140@gmail.com";
        $subject = "Message formulaire de contact WEBMASTER (blog JForteroche)";
        $headers .= 'From:"eldibaliya@gmail.com"' . "\n";
        $headers  = "Reply-to:" . stripslashes(htmlentities($emailContact)) . "\n";
        $headers .= 'Content-Type:text/html; charset="uft-8"' . "\n";
        $headers .= 'Content-Transfer-Encoding: 8bit';

        $message = "
                <html>
                    <body>
                    <div>
                    <p>Message de $fnameContact $lnameContact :</p> <br /><br />
                    <p style='border: 1px solid black; padding: 15px 15px; width: 280px; border-radius: 5px;'>
                        $messageContact
                    </p>
                    <br /><br />
                    <p>Email: $emailContact</p> <br />
                    <p>Tél: $phoneContact</p> <br />
                </div>
                    </body>
                </html>
                ";

        if (mail($dest, $subject, $message, $headers)) {
            $_SESSION['valide'] = "Votre message a été envoyé avec succès.";
        } else {
            $_SESSION['error'] = "Echec de l'envoi";
        };
    }
}
