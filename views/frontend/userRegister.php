<?php ob_start(); ?>
<?php $metaDescription = "Page d'inscription du blog de Jean Forteroche"; ?>
<?php $title = "Inscription" ?>

<div class="row">
    <form method="POST">
        <div class="form-group">
            <p>Page d'inscription</p>
            <p>
                <label for="pseudo">Pseudo :</label>
                <input type="text" class="form-control" name="pseudo">
            </p>
            <p>
                <label for="email">Votre email :</label>
                <input type="email" class="form-control" name="email">
            </p>
            <p>
                <label for="pass">Mot de passe :</label>
                <input type="password" class="form-control" name="pass">
            </p>
            <p>
                <input type="submit" class="btn btn-primary" value="S'inscrire"><br />
            </p>
        </div>
    </form>
</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views\frontend\template.php'; ?>