<?php ob_start(); ?>
<?php $metaDescription = "Page de connexion au blog de Jean Forteroche"; ?>
<?php $title = "Connexion" ?>

<div id="form-connexion" class="text-center col-lg-4 col-md-5 col-sm-6 mx-auto">
    <form method="POST">
        <div class="form-group">
            <h2 class="mb-3">Connexion</h2>
            <label for="pseudo">Pseudo</label>
            <?php echo $formContact->input('pseudo', 'text'); ?>
        </div>
        <div class="form-group pb-5">
            <label for="password">Mot de passe</label>
            <?php echo $formContact->input('pass', 'password'); ?>
        </div>
        <?php echo $formContact->submit("connexion", "Se connecter") ?>
        <p class="mt-5">Pour vous inscrire, <a href="index.php?action=register">cliquez ici.</a></p>
    </form>
</div>


<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/frontend/templates/default.php'; ?>