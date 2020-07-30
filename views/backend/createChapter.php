<?php ob_start(); ?>

<?php $title = "Ajout d'un chapitre" ?>

<div class="row">
    <div class="col">
        <h1 class="text-center">Mode édition</h1>

        <form method="post">
            <div class="form-group">
                <p><label for="num-chapitre">Numéro du chapitre</label>
                    <input type="text" name="num_chapter" placeholder="ex: Chapitre 1" class="form-control"></p>
            </div>
            <div class="form-group">
                <p><label for="titre">Titre du chapitre</label>
                    <input type="text" name="title" class="form-control"></p>
            </div>
            <div class="form-group">
                <textarea id="mytextarea" name="content" placeholder="Contenu...."></textarea>
            </div>

            <p><input type="submit" name="sendChapter" value="Publication" class="btn btn-primary"></p>
        </form>
    </div>
</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views\backend\template.php'; ?>