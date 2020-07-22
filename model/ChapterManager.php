<?php

require_once 'Chapter.php';

class ChapterManager
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
     * Affiche la liste des chapitres
     *
     * @return $chapters
     */
    public function getList()
    {
        $chapters = [];
        $req = $this->db->prepare("SELECT * FROM chapters");
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
        $req = $this->db->prepare('SELECT * FROM chapters WHERE id = ?');
        $req->execute([
            $id
        ]);
        $chapter = $req->fetch();
        return new Chapter($chapter);
    }

    /**
     * Insère un chapitre dans la base de données
     *
     * @param [type] $chapter
     * 
     */
    public function add($chapter)
    {
        $req = $this->db->prepare("INSERT INTO chapters(num_chapter, title, content, created_at) VALUES (:num_chapter, :title, :content, NOW())");
        $req->execute([
            'num_chapter' => $chapter->getNumChapter(),
            'title' => $chapter->getTitle(),
            'content' => $chapter->getContent()
        ]);
    }

    /**
     * Modifie un chapitre
     *
     * @param [type] $chapterId
     * @param [type] $numChapter
     * @param [type] $chapterTitle
     * @param [type] $chapterContent
     * 
     */
    public function update($chapterId, $numChapter, $chapterTitle, $chapterContent)
    {
        $req = $this->db->prepare("UPDATE chapters SET num_chapter=:num_chapter, title=:title , content=:content, created_at= NOW() WHERE id=:id ");
        $req->execute([
            'id'            => $chapterId,
            'num_chapter'   => $numChapter,
            'title'         => $chapterTitle,
            'content'       => $chapterContent
        ]);
    }

    /**
     * Supprime un chapitre
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
    }
}