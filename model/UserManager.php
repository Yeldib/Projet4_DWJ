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

    /**
     * Ajoute un nouveau membre dans la base de données
     *
     * @param User $user
     */
    public function add(User $user)
    {
        $req = $this->db->prepare("INSERT INTO users(pseudo, pass, email, roles) VALUES(:pseudo, :pass, :email, :roles)");
        $req->execute([
            'pseudo' => $user->getPseudo(),
            'pass' => $user->getPass(),
            'email' => $user->getEmail(),
            'roles' => $user->getRoles()
        ]);
    }

    /**
     * Vérifie si le pseudo existe dans la base de données
     * @param User $user
     * @return $result
     */
    public function findByPseudo(User $user)
    {
        $req = $this->db->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
        $req->execute([
            'pseudo' => $user->getPseudo()
        ]);

        $result = $req->fetch();
        return new User($result);
    }
}
