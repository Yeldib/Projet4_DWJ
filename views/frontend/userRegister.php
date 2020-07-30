<?php ob_start(); ?>
<?php $metaDescription = "Page d'inscription du blog de Jean Forteroche"; ?>
<?php $title = "Inscription" ?>

<div class="row">
    <form method="POST" id="form-register" class="mx-auto col-lg-4 col-md-5 text-center">
        <div class="form-group">
            <h2 class="pt-1 pb-3">Inscription</h2>
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
            <p class="pt-3">
                <input type="submit" class="btn btn-primary" value="S'inscrire"><br />
            </p>
        </div>
    </form>
</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views\frontend\template.php'; ?>