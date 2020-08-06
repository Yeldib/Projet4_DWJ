<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="<?= $metaDescription ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://kit.fontawesome.com/f12ce41413.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Meddon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title> <?= $title ?></title>
</head>

<body id="bg-img-body">

    <div class="container-fluid">

        <header>
            <!-- Navbar  -->
            <nav id="bg-navbar-frontview" class="navbar navbar-expand-md navbar-dark fixed-top">
                <a class="navbar-brand" href="index.php?action=home">Accueil</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=biography">À propos de l'auteur <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item" href="index.php?action=contact-webmaster">Développeur</a>
                                <a class="dropdown-item" href="index.php?action=contact-auteur">Auteur</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Liste des chapitres</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <?php foreach ($chapters as $chapter) : ?>
                                    <a class="dropdown-item" href="index.php?action=single&chapter_id=<?= $chapter->getId() ?>"><?= $chapter->getNumChapter() ?></a>
                                <?php endforeach ?>
                            </div>
                        </li>
                    </ul>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <a class="btn btn-outline-light btn-sm my-2 my-sm-0" href="views\frontend\signOut.php">Deconnexion</a>
                        <?php if ($_SESSION['roles'] === 'ROLE_ADMIN') { ?>
                            <a class="btn btn-outline-light btn-sm my-2 my-sm-0 ml-3" href="index.php?action=panel">Administration</a>
                        <?php } ?>
                    <?php } else { ?>
                        <a class="btn btn-outline-success btn-sm my-2 my-sm-0" href="index.php?action=connexion">Connexion</a>
                    <?php } ?>
                </div>
            </nav>
        </header>

        <!-- Message de notification -->
        <div>
            <?php
            Session::flashError();
            Session::flashValidate();
            ?>
        </div>

        <section>
            <?= $pageContent ?>
        </section>

        <footer id="bloc-footer" class="pt-2">
            <div class="row">
                <div class="col-12 col-md col-sm">
                    <small class="d-block mb-3 pl-3 text-footer">&copy;2019-2020</small>
                    <small class="d-block mb-3 pl-3 text-footer">Sujet de formation Openclassrooms</small>
                </div>

                <div class="col-12 col-md col-sm">
                    <h5 class=" text-footer">Contact</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class=" text-footer" href="index.php?action=contact-webmaster">Développeur</a></li>
                        <li><a class=" text-footer" href="index.php?action=contact-auteur">Auteur</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <script src="public/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>

</html>