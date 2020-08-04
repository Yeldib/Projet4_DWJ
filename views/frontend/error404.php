<?php ob_start(); ?>
<?php $metaDescription = "Page introuvable" ?>
<?php $title = "ERREUR 404" ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center mt-5">
                <h1>Oops!</h1>
                <h2>ERREUR 404</h2>
                <p>Désolé, une erreur s'est produite, page demandée introuvable!</p>
                <div>
                    <a href="index.php?action=home" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-home"></span>Retour à l'accueil </a>
                    <a class="btn btn-info btn-sm" href="index.php?action=contact-webmaster">Contactez le développeur</a>
                </div>
            </div>
        </div>
    </div>
</div>




<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/frontend/templates/error404.php'; ?>