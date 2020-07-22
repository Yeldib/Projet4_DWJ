<?php
session_start();
require_once '../model/ChapterManager.php';
if (
    isset($_GET['chapter_id'])
    && !empty($_GET['chapter_id'])
    && (int) $_GET['chapter_id']
) {

    $chapterManager = new ChapterManager;
    $chapterManager->delete($_GET['chapter_id']);

    // $_SESSION['message'] = "Chapitre supprimé";

    header('Location: ../index.php');
}
