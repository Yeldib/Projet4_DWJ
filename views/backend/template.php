<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://cdn.tiny.cloud/1/th66f2zf09ao7uqyjdg67jo3iq5bys29vb81bw089m2g993q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title> <?= $title ?> </title>
</head>

<body>

    <div class="container">
        <div class="container">
            <header>
                <div class="nav-scroller py-1 mb-2">
                    <nav class="nav d-flex justify-content-between">
                        <a class="btn btn-primary" href="index.php?action=home">Accueil du site</a>
                        <?php if (isset($_SESSION['id'])) { ?>
                            <a class="btn btn-sm btn-outline-secondary" href="views/frontend/signOut.php">Deconnexion</a>
                        <?php } else { ?>
                            <a class="btn btn-sm btn-outline-secondary" href="index.php?action=connexion">Connexion</a>
                        <?php } ?>
                    </nav>
                </div>
            </header>
            <?= $pageContent ?>
        </div>

    </div>

    <script src="public/js/tinymce.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>

</html>