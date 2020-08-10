<?php ob_start(); ?>

<?php $title = "Ajout d'un chapitre" ?>

<div class="row">
    <div class="col">
        <h1 class="text-center">Mode édition</h1>

        <form method="post">
            <div class="form-group">
                <label for="num-chapitre">Numéro du chapitre</label>
                <?php echo $formContact->input("num_chapter", "text", "ex: Chapitre 1") ?>
            </div>
            <div class="form-group">
                <label for="title">Titre du chapitre</label>
                <?php echo $formContact->input("title", "text") ?>
            </div>
            <div class="form-group">
                <?php echo $formContact->textArea("content", "Contenu...") ?>
            </div>

            <p><input type="submit" name="sendChapter" value="Publication" class="btn btn-primary"></p>
        </form>
    </div>
</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/backend/template.php'; ?>