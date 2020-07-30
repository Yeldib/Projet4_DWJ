<?php ob_start(); ?>
<?php $metaDescription = "Page de connexion au blog de Jean Forteroche"; ?>
<?php $title = "Connexion" ?>

<form method="POST" id="form-connexion" class="mx-auto col-lg-4 col-md-5 text-center">
    <div class="form-group">
        <h2 class="pt-1 pb-3">Connexion</h2>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control">
    </div>
    <div class="form-group pb-5">
        <label for="password">Mot de passe</label>
        <input type="password" name="pass" class="form-control" id="password">
    </div>
    <button type="submit" name="connexion" class="btn btn-primary btn-sm ">Se connecter</button>
    <p class="mt-5">Pour vous inscrire, <a href="index.php?action=register">cliquez ici.</a></p>
</form>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views\frontend\template.php'; ?>