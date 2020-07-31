<?php ob_start(); ?>
<?php $title = "Modification d'un chapitre" ?>

<h1>Modification du <?= $chapter->getNumChapter() ?></h1>

<form method="post">
    <div class="form-group">
        <p><label for="num-chapitre">N° chapitre</label>
            <input type="text" name="num_chapter" class="form-control" value="<?= $chapter->getNumChapter() ?>"></p>
    </div>
    <div class="form-group">
        <p><label for="titre">Titre</label>
            <input type="text" name="title" class="form-control" value="<?= $chapter->getTitle() ?>"></p>
    </div>
    <div class="form-group">
        <textarea id="mytextarea" name="content"><?= $chapter->getContent() ?></textarea>
    </div>

    <p><input type="submit" name="envoyer-contenu" value="Modifier" class="btn btn-primary"></p>
    <input type="hidden" name="id" value="<?= $chapter->getId() ?>">
</form>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/backend/template.php'; ?>