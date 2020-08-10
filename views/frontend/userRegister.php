<?php ob_start(); ?>
<?php $metaDescription = "Page d'inscription du blog de Jean Forteroche"; ?>
<?php $title = "Inscription" ?>

<div id="form-register" class="text-center col-lg-4 col-md-5 col-sm-6 mx-auto">
    <form method="POST">
        <div class="form-group">
            <h2 class="mb-3">Inscription</h2>

            <label for="pseudo">Pseudo</label>
            <?php echo $formContact->input('pseudo', 'text', 'Le pseudonyme doit contenir entre 4 et 15 caractères.'); ?>

            <label for="email">Votre email</label>
            <?php echo $formContact->input('email', 'email', 'Ex: mail@gmail.com') ?>

            <label for="pass">Mot de passe</label>
            <?php echo $formContact->input('pass', 'password') ?>

            <small>Le mot de passe doit faire au moins 8 caractères et doit comporter au moins une majuscule et un caractère spécial.</small>

            <?php echo $formContact->submit('submit', "S'inscrire") ?>

        </div>
    </form>
</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/frontend/templates/default.php'; ?>