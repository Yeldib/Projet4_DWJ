<?php

class UserManager extends Manager
{
    /**
     * Connexion à la base de données
     */
    public function __construct()
    {
        $this->getConnect();
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
     *
     * @param [type] $pseudo
     */
    public function isPseudoExist($pseudo)
    {
        $req = $this->db->prepare('SELECT * FROM users WHERE LOWER(pseudo) = ?');
        $req->execute([
            strtolower($pseudo)
        ]);

        $data = $req->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return false;
        } else {
            return new User($data);
        }
    }

    /**
     * Vérifie si le mail existe dans la base de données
     *
     * @param [type] $email
     */
    public function isEmailExist($email)
    {
        $query = $this->db->prepare('SELECT email FROM users WHERE LOWER(email) = ?');
        $query->execute([
            strtolower($email)
        ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
