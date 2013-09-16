<div class="page-header">
    <div class="row">
        <div class ="offset2 span2" ><img src="../img/innova.jpg" alt="Image" class = "logo"></div>
        <div class=" span4 titre"><h1 class="titre"><a href="categorie.php">Catarina</a></h1><br/><p>Un CATAlogue de Ressources pour l’InnovatioN en lAngues </p></div>
        <div class =" span2" ><img src="../img/stendhal.jpg" alt="Image" class = "logo"></div>
<?php

    $uri = $_SERVER["REQUEST_URI"];

    $adresse = explode ("?",$_SERVER["REQUEST_URI"]);
    $adresse_index ="../index.php";
    if(strpos($uri,'/php/categorie.php') && !isset($_POST["recherche"])){

        echo '
                <div class="accueil offset1 span10 well ">
                    <p>Destinés aux acteur de la formation en langues, cette base de données <strong>collaborative</strong> conçue dans le cadre du projet INNOVA-Langues a pour ambition d’améliorer sensiblement les pratiques des enseignants, tuteurs, apprenants ou encore concepteurs pédagogiques.
                    </p>
                    <p>Aidez-nous à enrichir ce catalogue !
                    </p>
                    <p>Vous pouvez ajouter de nouveaux éléments en cliquant sur <em>indexation</em> en bas de la page ou compléter les pages existantes avec des ressources associées qui portent sur le fonctionnement ou qui donnent des idées d’usages pour l’enseignement-apprentissage des langues.
                    </p>
                </div>';   
    } ?>

    </div>
</div>