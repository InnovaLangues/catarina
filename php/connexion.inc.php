<?php
    $serveur = "localhost";
    $username = "catarina";
    $password = "catarina%1";
    $base = "catarina";
    $fichier_xml = "liste_modele.xml";
     
    $link = mysql_connect($serveur,$username,$password);
    if (!$link) {
        die('Pb de connexion à la BD: ' . mysql_error());
    }
    else{
        mysql_query("USE ".$base);
        mysql_query("SET NAMES 'utf8'");
    }
   
    $uri = $_SERVER["REQUEST_URI"];

    $address = strstr($uri, '/php/');

    $address = explode('?', $address);

    $base_address = $address[0];

    if (isset($address[1])) {
        $param = explode('=', $address[1]);
        $param = $param[1];   
    }

    // Merci Loriane !
    switch($base_address){
        case "/php/categorie.php":
            $_SESSION["categorie"] = "accueil";
        break;
        case "/php/catalogue.php":
            $_SESSION["categorie"] = $param;
        break;
        case "/php/liste.php":
            $_SESSION["categorie"] = $param;
        break;           
    }
