<?php ob_start(); ?>
<?php $metaDescription = "Page d'inscription du blog de Jean Forteroche"; ?>
<?php $title = "Inscription" ?>

<div id="form-register" class="text-center col-lg-4 col-md-5 col-sm-6 mx-auto">
    <form method="POST" class="form-signin">
        <div class="form-group">
            <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
            <p>
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" name="pseudo">
            </p>
            <p>
                <label for="email">Votre email</label>
                <input type="email" class="form-control" name="email">
            </p>
            <p>
                <label for="pass">Mot de passe</label>
                <input type="password" class="form-control" name="pass">
            </p>
            <p><em>Le mot de passe doit faire au moins 8 caractères et doit comporter au moins une majuscule et un caractère spécial.</em></p>
            <p class="pt-1 pb-4">
                <input type="submit" class="btn btn-primary btn-sm" value="S'inscrire"><br />
            </p>
        </div>
    </form>
</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/frontend/template.php'; ?>