<?php ob_start(); ?>
<?php $metaDescription = "Vous êtes sur la page de lecture du " . $chapter->getNumChapter() . " intitulé " . $chapter->getTitle() ?>

<?php $title =  $chapter->getNumChapter() . " - " . $chapter->getTitle() ?>

<!-- Affiche un chapitre -->
<div id="single-chapter" class="col">
    <div id="bg-color-single-chapter" class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-3 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary"><?= $chapter->getNumChapter() ?></strong>
            <h3 class="mb-0"><?= $chapter->getTitle() ?></h3>
            <div class="mb-1 text-muted">publié le <?= $chapter->getCreatedAt() ?></div>
            <p class="card-text mb-auto"><?= $chapter->getContent() ?></p>
        </div>
    </div>
</div>

<!-- Formulaire commentaires -->
<?php if (isset($_SESSION['id'])) { ?>
    <div class="row">
        <form id="bloc-form-comment" method="POST">
            <div id="comment-form" class="form-group">
                <p>Votre avis m'intéresse, n'hésitez pas à commenter.</p>

                <label for="author">Pseudo</label>
                <?php
                echo $formContact->inputSession("author", "text", $_SESSION['pseudo']);
                // echo $formContact->input("author", "text"); 
                ?>

                <label for="comment">Votre commentaire</label>
                <?php echo $formContact->textArea('comment', 'Votre message.') ?>

                <?php echo $formContact->submit("send", "Poster votre message") ?>
            </div>
        </form>
    </div>
<?php } else { ?>
    <div id="info-not-registered">
        <p>Il faut être <a href="index.php?action=register">inscrit</a> pour commenter. </p>
    </div>
<?php } ?>


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
<?php require 'views/frontend/templates/default.php'; ?>