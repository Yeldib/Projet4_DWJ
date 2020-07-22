<?php

require_once 'Comment.php';

class CommentManager
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
     * Retourne la liste des commentaires d'un chapitre
     *
     * @param [type] $id 
     * @return $comments
     */
    public function getById($id)
    {
        $comments = [];
        $req = $this->db->prepare('SELECT * FROM comments WHERE chapter_id = :chapter_id');
        $req->execute(['chapter_id' => $id]);
        while ($data = $req->fetch()) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    /**
     * Insère un commentaire 
     *
     * @param Comment $insert
     * 
     */
    public function insert(Comment $insert)
    {
        $req = $this->db->prepare('INSERT INTO comments(chapter_id, author, comment, created_at) VALUES(:chapter_id, :author, :comment, NOW())');
        $req->execute([
            'chapter_id'    => $insert->getChapterId(),
            'author'        => $insert->getAuthor(),
            'comment'       => $insert->getComment()
        ]);
    }

    /**
     * Affiche la liste des commentaires
     *
     * @return $comments
     */
    public function getList()
    {
        $comments = [];
        $req = $this->db->prepare("SELECT * FROM comments");
        $req->execute();
        while ($data = $req->fetch()) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }
}
