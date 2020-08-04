<?php ob_start(); ?>
<?php $title = "Page d'administration" ?>


<h1 class="text-center">Page de modération</h1>

<p class="text-center"><em><?= "Bonjour " .  $_SESSION['pseudo'] ?></em></p>

<h3 class="text-center mb-5 mt-5">Liste des commentaires</h3>

<section id="bloc-list-comments-panel" class="container text-center">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <th>Pseudo</th>
                    <th>Commentaires</th>
                    <th>Actions</th>
                    <th>Signalé</th>
                </thead>
                <tbody>
                    <?php foreach ($comments as $comment) { ?>
                        <tr>
                            <td><?= $comment->getAuthor() ?></td>
                            <td><?= $comment->getComment() ?></td>
                            <td>
                                <a href="index.php?action=panel&id=<?= $comment->getId() ?>" onclick="return confirm('Supprimer ce commentaire ?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                            <td>
                                <?php if ($comment->getReport() == 1) { ?>
                                    <p style="color: red;">Oui</p>
                                <?php } else { ?>
                                    <p style="color: green;">non</p>
                                <?php } ?>

                            </td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>
</section>

<h3 class="text-center mb-5 mt-5">Liste des chapitres</h3>
<p class="text-center"><a href="index.php?action=create" class="btn btn-primary">Rédiger un chapitre</a><br><br></p>

<section id="bloc-list-chapters-panel" class="container text-center mb-5">
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
                                <a href="index.php?action=single&chapter_id=<?= $chapter->getId() ?>"><i class="far fa-eye"></i></a> |
                                <a href="index.php?action=update&chapter_id=<?= $chapter->getId() ?>"><i class="fas fa-edit"></i></a> |
                                <a href="index.php?action=panel&chapter_id=<?= $chapter->getId() ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>

        </div>
    </div>
</section>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/backend/template.php'; ?>