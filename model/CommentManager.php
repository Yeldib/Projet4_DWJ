<?php

class CommentManager extends Manager
{
    /**
     * Connexion à la base de données
     */
    public function __construct()
    {
        $this->getConnect();
    }

    public function countByChapterId($chapterId)
    {
        $req = $this->db->prepare('SELECT COUNT(*) FROM comments WHERE chapter_id = ?');
        $req->execute([
            $chapterId
        ]);
        return $req->fetch();
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
        $req = $this->db->prepare('SELECT id, chapter_id, author, comment, report, DATE_FORMAT(created_at, \'%d/%m/%Y à %Hh%i\') AS created_at FROM comments WHERE chapter_id = :chapter_id ORDER BY created_at');
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
        $req = $this->db->prepare("SELECT * FROM comments LIMIT 5");
        $req->execute();
        while ($data = $req->fetch()) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    /**
     * Signale un commentaire
     *
     * @param [type] $id
     * 
     */
    public function report($id)
    {
        $req = $this->db->prepare('UPDATE comments SET report= 1 WHERE id = ?');
        $req->execute([
            $id
        ]);
    }

    /**
     * Supprime un commentaire
     *
     * @param [type] $id
     * 
     */
    public function delete($id)
    {
        $req = $this->db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute([
            $id
        ]);
        $req->execute();
    }
}
