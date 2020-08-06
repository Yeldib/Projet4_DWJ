<?php ob_start(); ?>
<?php $metaDescription = "Biographie de l'écrivain Jean Forteroche" ?>
<?php $title = "Biographie" ?>

<div id="bloc-biography" class="jumbotron">
    <div class="row">
        <div class="col-xs-12">
            <h1 id="h1-title-biography">Jean Forteroche</h1>
            <div class="hero-image-author">
            </div>
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 mx-auto">
                <p id="biography-content">Né en 1952, Jean Forteroche n'a eu cesse depuis d'épater la galerie par ces incessants apports dans le monde de la culture, des sciences en particulier au sein de la «confédération des Ingénieurs de Gisors de France et de Navarre» puissante association créée par Charles Quint quand il prit le pouvoir un samedi peu avant l'heure du repas. <br><br>

                    Jean Forteroche a entamé son chemin vers la gloire en inventant les Plumes qui devinrent depuis le summum de la distinction pour tout homme moderne. En effet qui depuis n'a pas exhibé fièrement ses Plumes à la foule envieuse ? Pour cela, les habitants de la planète entière et en particulier de Gisors lui sont reconnaissants. <br><br>

                    C'est par un beau jour en Novembre que Forteroche a rencontré Virginia Woolf et décida de la conquérir grâce à son charme et au prestige que lui avait donné l'invention des Plumes. Virginia Woolf dira pourtant plus tard «ce qui m'a fait le plus craquer chez Jean, c'est la proéminence de ses !». Elle ne s'en est d'ailleurs jamais remis depuis. <br><br>

                    15 ans plus tard il découvre dans une librairie poussiéreuse de Gisors un livre de Gustave Flaubert intitulé : les Plumes poussent sous les étoiles. <br><br>
                    Pour Jean Forteroche c'est une révélation, il s'attelle à la rédaction de :«Les Ingénieurs de Gisors gouverneront en Novembre », Une œuvre majeure qui l'occupera jusqu'à ce qu'il atteigne 68 ans cet opus sortira en librairie Samedi prochain. <br><br>

                    Le livre est tant attendu que son éditeur prétend pouvoir gagner, grâce à sa publication, une somme qui pourrai atteindre 14 euros et cinquante cents.
                    Comme l'a si justement fait remarquer Gustave Flaubert «Ce livre est une œuvre impérissable que Forteroche a écrit avec amour et sans aucune concession.».</p>

                <blockquote>
                    <p>"Exige beaucoup de toi-même et attends peu des autres. Ainsi beaucoup d'ennuis te seront épargnés."</p>
                </blockquote>

            </div>
        </div>
    </div>
</div>


<?php $pageContent = ob_get_clean(); ?>
<?php require 'views/frontend/templates/default.php'; ?>