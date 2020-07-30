<?php ob_start(); ?>
<?php $metaDescription = "Vous êtes sur la page de lecture du " . $chapter->getNumChapter() . " intitulé " . $chapter->getTitle() ?>

<?php $title =  $chapter->getNumChapter() . " - " . $chapter->getTitle() ?>

<!-- Affiche un article -->
<div class="row mb-4 mt-5 mr-5 ml-5">
    <?php if (!empty($chapter)) { ?>
        <div class="col">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-light">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary"><?= $chapter->getNumChapter() ?></strong>
                    <h3 class="mb-0"><?= $chapter->getTitle() ?></h3>
                    <div class="mb-1 text-muted">publié le <?= $chapter->getCreatedAt() ?></div>
                    <p class="card-text mb-auto pl-5 pr-5 pt-5 pb-5"><?= $chapter->getContent() ?></p>
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
    <form id="bloc-form-comment" method="POST">
        <div id="comment-form" class="form-group">
            <p>Votre avis m'intéresse, n'hésitez pas à commenter.</p>
            <p>
                <label for="author">Pseudo</label>
                <input type="text" class="form-control" name="author" value="<?php if (isset($_SESSION['pseudo'])) {
                                                                                    echo $_SESSION['pseudo'];
                                                                                }  ?>">
            </p>
            <p>
                <label for="comment">Votre commentaire</label>
                <textarea id="textaera-form-comment" rows="5" name="comment" class="form-control"></textarea>
            </p>
            <p>
                <input type="submit" class="btn btn-primary btn-sm" value="Poster votre message"><br />
            </p>
        </div>
    </form>
</div>

<!-- affiche la liste des commentaires d'un chapitre -->
<div class="row">
    <div id="bloc-comment" class="col-lg-6 col-sm-12 mb-5">
        <?php if (count($comments) === 0) : ?>
            <p id="info-no-comment">Il n'y a pas de commentaires ... SOYEZ LE PREMIER !</p>
        <?php else : ?>
            <p id="count-comment-reaction"><em>Il y a déjà <?= count($comments) ?> réactions : </em></p>
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
                    <button id="btn-report-comment" class="btn btn-light font-italic" onclick="return confirm('Signaler ce commentaire ?');"><i class="fas fa-exclamation-triangle"></i> Signaler</button>
                    <hr>
                </form>
            <?php endforeach ?>
        <?php endif ?>
    </div>

</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views\frontend\template.php'; ?>