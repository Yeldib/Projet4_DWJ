<?php ob_start(); ?>
<?php $metaDescription = "Page de connexion au blog de Jean Forteroche"; ?>
<?php $title = "Connexion" ?>

<form method="POST" class="col-3 mx-auto">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="pass" class="form-control" id="password">
    </div>
    <button type="submit" name="connexion" class="btn btn-primary btn-sm">Se connecter</button>
    <p>Pour vous inscrire, <a href="index.php?action=register">cliquez ici.</a></p>
</form>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views\frontend\template.php'; ?>