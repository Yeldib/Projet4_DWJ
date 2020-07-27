<?php ob_start(); ?>
<?php $metaDescription = "Page de connexion au blog de Jean Forteroche"; ?>
<?php $title = "Connexion" ?>

<form method="POST">
    <h2>Se connecter</h2><br>
    <p><input type="text" name="pseudo" placeholder="Pseudo"></p>
    <p><input type="password" name="pass" placeholder="Mot de passe"></p>
    <p><input type="submit" name="connexion" value="Connexion"></p>
    <p>Vous n'avez pas encore de compte ? <a href="index.php?action=register">Vous inscrire.</a></p>
</form>


<?php $pageContent = ob_get_clean(); ?>
<?php require 'views\frontend\template.php'; ?>