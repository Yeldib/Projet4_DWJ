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

    // Affiche un chapitre avec ces commentaires
    public function single()
    {
    }
}
