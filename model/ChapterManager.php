<?php

class ChapterManager extends Manager
{
    /**
     * Connexion à la base de données
     */
    public function __construct()
    {
        $this->getConnect();
    }

    /**
     * Affiche la liste des chapitres
     *
     * @return $chapters
     */
    public function getList()
    {
        $chapters = [];
        $req = $this->db->prepare('SELECT id, title, content, num_chapter, DATE_FORMAT(created_at, \'%d/%m/%Y à %Hh%i\') AS created_at FROM chapters ORDER BY created_at DESC');
        $req->execute();
        while ($data = $req->fetch()) {
            $chapters[] = new Chapter($data);
        }
        return $chapters;
    }

    /**
     * Affiche un chapitre
     *
     * @param [type] $id
     * 
     */
    public function get($id)
    {
        $req = $this->db->prepare('SELECT id, title, content, num_chapter, DATE_FORMAT(created_at, \'%d/%m/%Y à %Hh%i\') AS created_at FROM chapters WHERE id = ?');
        $req->execute([
            $id
        ]);
        $chapter = $req->fetch();
        if ($chapter)
            return new Chapter($chapter);
        return false;
    }

    /**
     * Insère un chapitre dans la base de données
     *
     * @param Chapter $chapter
     *
     */
    public function add(Chapter $chapter)
    {
        $req = $this->db->prepare("INSERT INTO chapters(num_chapter, title, content, created_at) VALUES (:num_chapter, :title, :content, NOW())");
        $req->execute([
            'num_chapter'   => $chapter->getNumChapter(),
            'title'         => $chapter->getTitle(),
            'content'       => $chapter->getContent()
        ]);
    }


    /**
     * Modification d'un chapitre
     *
     * @param Chapter $update
     * 
     */
    public function update(Chapter $update)
    {
        $req = $this->db->prepare("UPDATE chapters SET num_chapter=:num_chapter, title=:title , content=:content, created_at= NOW() WHERE id=:id ");
        $req->execute([
            'id'            => $update->getId(),
            'num_chapter'   => $update->getNumChapter(),
            'title'         => $update->getTitle(),
            'content'       => $update->getContent()
        ]);
    }

    /**
     * Supprime un chapitre et les commentaires associés à ce dernier.
     *
     * @param [type] $id
     * 
     */
    public function delete($id)
    {
        $req = $this->db->prepare('DELETE FROM chapters WHERE id = ?');
        $req->execute([
            $id
        ]);
        $req->execute();

        $req = $this->db->prepare('DELETE FROM comments WHERE chapter_id = ?');
        $req->execute([
            $id
        ]);
        $req->execute();
    }
}
