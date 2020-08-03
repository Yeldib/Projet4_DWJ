<?php ob_start(); ?>
<?php $metaDescription = "Page de contact de l'auteur"; ?>
<?php $title = "Contact Auteur" ?>

<div id="form-contact-dev" class="row">
    <div class="col-md-6">
        <div class="well well-sm">
            <form class="form-horizontal" method="post">
                <fieldset>
                    <legend class="header">Contactez Jean Forteroche</legend>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                            <input type="text" name="" id="" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                        <div class="col-md-8">
                            <input type="email" name="" id="" placeholder="Adresse email">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                        <div class="col-md-8">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Votre message ici"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary btn-sm" value="Envoyer">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/frontend/template.php'; ?>