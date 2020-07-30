<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="<?= $metaDescription ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://kit.fontawesome.com/f12ce41413.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Meddon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title> <?= $title ?></title>
</head>

<body>

    <div class="container">

        <!-- Message de notification -->
        <?php
        Session::flashError();
        Session::flashValidate();
        ?>

        <!-- Navbar -->
        <header>
            <div class="nav-scroller py-0 mb-2 col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?action=home">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">À propos de l'auteur</a>
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
            </div>
        </header>

        <div class="container">
            <?= $pageContent ?>
        </div>

    </div>

    <script src="public/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>

</html>