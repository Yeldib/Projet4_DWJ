<?php ob_start(); ?>
<?php $title = "Page d'administration" ?>


<h1>Page de modération</h1>

<h2>Liste des commentaires</h2>

<section class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <th>Pseudo</th>
                    <th>Commentaires</th>
                    <th>Actions</th>
                    <th>Signalement</th>
                </thead>
                <tbody>
                    <?php foreach ($comments as $comment) { ?>
                        <tr>
                            <td><?= $comment->getAuthor() ?></td>
                            <td><?= $comment->getComment() ?></td>
                            <td>
                                <a href="index.php?action=panel&id=<?= $comment->getId() ?>" onclick="confirm('Supprimer ce commentaire ?')">Supprimer</a>
                            </td>
                            <td>
                                <?php if ($comment->getReport() == 1) { ?>
                                    <p>Oui</p>
                                <?php } else { ?>
                                    <p>non</p>
                                <?php } ?>

                            </td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>
</section>

<h2>Liste des chapitres</h2>
<a href="index.php?action=create" class="btn btn-primary">Rédiger un chapitre</a><br><br>

<section class="container">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <th>Numéro du chapitre</th>
                    <th>Titre</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php foreach ($chapters as $chapter) { ?>
                        <tr>
                            <td><?= $chapter->getNumChapter() ?></td>
                            <td><?= $chapter->getTitle() ?></td>
                            <td>
                                <a href="views/frontend/single.php?chapter_id=<?= $chapter->getId() ?>">Voir</a> |
                                <a href="index.php?action=update&chapter_id=<?= $chapter->getId() ?>">Modifier</a> |
                                <a href="index.php?action=panel&chapter_id=<?= $chapter->getId() ?>" onclick="confirm('Supprimer ce commentaire ?')">Supprimer</a>
                            </td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>

        </div>
    </div>
</section>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views\backend\template.php'; ?>