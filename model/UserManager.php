<?php
class UserManager
{
    private $db;

    /**
     * Connexion à la base de données
     */
    public function __construct()
    {
        try {
            $this->db = new PDO(
                'mysql:host=localhost;dbname=blog_jforteroche;charset=utf8;port=3308',
                'root',
                '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function add(User $user)
    {
        $req = $this->db->prepare("INSERT INTO users(pseudo, pass, email) VALUES(:pseudo, :pass, :email)");
        $req->execute([
            'pseudo' => $user->getPseudo(),
            'pass' => $user->getPass(),
            'email' => $user->getEmail()
        ]);
    }
}
