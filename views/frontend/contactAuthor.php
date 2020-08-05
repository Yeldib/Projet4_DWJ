<?php ob_start(); ?>
<?php $metaDescription = "Page de contact de l'auteur"; ?>
<?php $title = "Contact Auteur" ?>


<div id="form-contact-author" class="row">
    <div class="col-lg-7 col-md-12 col-sm-12">
        <div class="well well-sm">
            <form class="form-horizontal" method="post">
                <fieldset>
                    <legend class="text-center header">Contacter l'Auteur</legend>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                            <?php echo $formContact->input('fname', 'text', 'Nom'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                            <?php echo $formContact->input('lname', 'text', 'Prénom'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                        <div class="col-md-8">
                            <?php echo $formContact->input('email', 'email', 'Adresse email'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                        <div class="col-md-8">
                            <?php echo $formContact->input('phone', 'tel', 'Numéro de télephone'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                        <div class="col-md-8">
                            <?php echo $formContact->textArea('message', 'Entrez votre message ici. Je vous répondrai le plus rapidement possible.') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <?php echo $formContact->submit('mailform'); ?>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/frontend/templates/default.php'; ?>