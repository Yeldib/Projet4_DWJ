<?php ob_start(); ?>
<?php $metaDescription = "Vous êtes sur la page de lecture du " . $chapter->getNumChapter() . " intitulé " . $chapter->getTitle() ?>

<?php $title =  $chapter->getNumChapter() . " - " . $chapter->getTitle() ?>

<!-- Affiche un article -->
<div class="row mb-2">
    <?php if (!empty($chapter)) { ?>
        <div class="col">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary"><?= $chapter->getNumChapter() ?></strong>
                    <h3 class="mb-0"><?= $chapter->getTitle() ?></h3>
                    <div class="mb-1 text-muted"><?= $chapter->getCreatedAt() ?></div>
                    <p class="card-text mb-auto"><?= $chapter->getContent() ?></p>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <?= $_SESSION['flash'] = "URL INVALIDE";
        // header('Location: ../index.php');
        ?>
    <?php } ?>
</div>

<!-- Formulaire commentaires -->
<div class="row">
    <form method="POST">
        <div class="form-group">
            <p>Votre avis m'intéresse, n'hésitez pas à commenter.</p>
            <p>
                <label for="author">Pseudo :</label>
                <input type="text" class="form-control" name="author">
            </p>
            <p>
                <label for="comment">Votre commentaire :</label>
                <textarea name="comment" class="form-control"></textarea>
            </p>
            <p>
                <input type="submit" class="btn btn-primary" value="Poster votre message"><br />
            </p>
        </div>
    </form>
</div>

<!-- affiche la liste des commentaires d'un chapitre -->
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <?php if (count($comments) === 0) : ?>
            <p>Il n'y a pas de commentaires ... SOYEZ LE PREMIER !</p>
        <?php else : ?>
            <em>Il y a déjà <?= count($comments) ?> réactions : </em><br>
            <hr>
            <?php foreach ($comments as $comment) : ?>
                <p>
                    <strong>Commentaire de <?= $comment->getAuthor() ?></strong>
                    <small>Le <?= $comment->getCreatedAt() ?></small>

                </p>
                <blockquote>
                    <em><?= $comment->getComment() ?></em><br>
                </blockquote>

                <form method="post">
                    <input type="hidden" name="report" value="<?= $comment->getId() ?>">
                    <button class="btn btn-light font-italic"><i class="fas fa-exclamation-triangle"></i> Signaler</button>
                    <hr>
                </form>
            <?php endforeach ?>
        <?php endif ?>
    </div>

</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views\frontend\template.php'; ?>