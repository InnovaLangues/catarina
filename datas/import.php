 <?php
 
$serveur = "localhost"; 
$username = "catarina";
$password = "catarina"; 
$base = "catarina"; 
$fichier_xml = "liste_modele.xml"; 
 
$link = mysql_connect($serveur,$username,$password); 
if (!$link) { die('Pb de connexion à la BD: ' . mysql_error()); 
} 
else{
	mysql_query("USE ".$base);
	mysql_query("SET NAMES 'utf8'");
}
?>

<!DOCTYPE html>
 <html>
	<head>
		<title>Import Catarina</title>
		<meta charset="utf-8"/>
	</head>
	<body>
	
<?php


	$xml = new DomDocument();
	$xml -> load ($fichier_xml);

		
	$element_ressource = $xml->getElementsByTagName('ressource');
	foreach($element_ressource as $ressource){
		getRessource($ressource);
	}
	
	print "<p> Enregistrement effectué </p>";



	
///////////////////////////////////////////////////////////////////////
//////// Fonction d'enregistrement de workspace ////////////////////////
///////////////////////////////////////////////////////////////////////

function getRessource ($ressource){
	$attr["nom"] = addslashes($ressource->getAttribute("nom"));
	$attr["description"] = addslashes($ressource->getAttribute("description"));
	$attr["url"] = addslashes($ressource->getAttribute("url"));
	$attr["auteur"] = addslashes($ressource->getAttribute("auteur")); 
	$attr["version"] = addslashes($ressource->getAttribute("version"));
	if ($ressource->getAttribute("repertoire") == "Oui")
		$attr["repertoire"] = 1;
	else 
		$attr["repertoire"] = 0;
	$attr["ressource_fonctionnement"] = addslashes($ressource->getAttribute("ressource_fonctionnement"));
	$attr["ressource_analogue"] = addslashes($ressource->getAttribute("ressource_analogue"));	

		
	//Création de la note 
	$sql = "INSERT INTO `cat_note`(`note`, `nb_votant`) VALUES "; 
	$sql .= "(2.5, 0)";
	mysql_query($sql);
	$note_id = mysql_insert_id();	
		
		
	//Création de ressource
	$sql = "INSERT INTO `cat_ressource`(`nom`, `url`, `auteur`, `version`, `description`, `repertoire`, `ressource_fonctionnement`, `ressource_analogue`, `note_id`) VALUES "; 
	$sql .= "('".$attr["nom"]."','".$attr["url"]."','".$attr["auteur"]."','".$attr["version"]."','".$attr["description"]."',".$attr["repertoire"].",'".$attr["ressource_fonctionnement"]."','".$attr["ressource_analogue"]."', ".$note_id.")";
	mysql_query($sql);
	$ressource_id = mysql_insert_id();
		
		
	//Création de langue
	$element_langue = $ressource->getElementsByTagName('langue');
	foreach($element_langue as $langue){
		getLangue($langue, $ressource_id);
	}
	
	//Création de type 
	$element_type = $ressource->getElementsByTagName('type');
	foreach($element_type as $type){
		getTypeRessource($type, $ressource_id);
	}
	
	//Création de profil 
	$element_profil = $ressource->getElementsByTagName('profil');
	foreach($element_profil as $profil){
		getProfil($profil, $ressource_id);
	}
	
	//Création de activite_langagiere
	$element_activite = $ressource->getElementsByTagName('activite_langagiere');
	foreach($element_activite as $activite){
		getActivite($activite, $ressource_id);
	}	
		

}
	

	

function getLangue ($langue, $ressource_id){
	$attr["nom"] = addslashes($langue->getAttribute("nom"));
	$langues = 	explode(',',$attr["nom"]);
	
	
	foreach ($langues as $lan){
		$sql = "SELECT * FROM `cat_langue` WHERE "; 
		$sql .= "nom LIKE '%".$lan."%'";
		$result = mysql_query($sql);
		$compteur = mysql_num_rows($result);
		if ($compteur ==0){
			$sql = "INSERT INTO `cat_langue`(`nom`) VALUES "; 
			$sql .= "('".$lan."')";
			mysql_query($sql);
			$langue_id = mysql_insert_id();
		}
		else {
			while ($row = mysql_fetch_array($result)) {
				$langue_id = $row["id"];
			}
		}
		
		$sql = "INSERT INTO `cat_ressource_langue`(`ressource_id`, `langue_id`) VALUES "; 
		$sql .= "(".$ressource_id.",".$langue_id.")";
		mysql_query($sql);
	}	
	
}


function getTypeRessource ($type, $ressource_id){
	$attr["nom"] = addslashes($type->getAttribute("nom"));
	$type = explode("/", $attr["nom"]);
	
	if (isset($type[1])){
	$sql = "SELECT * FROM `cat_type` WHERE "; 
	$sql .= "nom = '".$type[1]."'";
	$sql .= " AND parent_id IN (SELECT id FROM `cat_type` WHERE nom ='".$type[0]."')";
	}else {
		$sql = "SELECT * FROM `cat_type` WHERE "; 
		$sql .= "nom = '".$type[0]."'";
	}
	$result = mysql_query($sql);
	$compteur = mysql_num_rows($result);
	if ($compteur ==0){
		$sql = "INSERT INTO `cat_type`(`nom`) VALUES "; 
		$sql .= "('".$attr["nom"]."')";
		mysql_query($sql);
		$type_id = mysql_insert_id();
	}
	else {
		while ($row = mysql_fetch_array($result)) {
			$type_id = $row["id"];
		}
	}	
	
	$sql = "INSERT INTO `cat_ressource_type`(`ressource_id`, `type_id`) VALUES "; 
	$sql .= "(".$ressource_id.",".$type_id.")";
	mysql_query($sql);
	
}	




function getProfil ($profil, $ressource_id){
	$attr["nom"] = addslashes($profil->getAttribute("nom"));

	$sql = "SELECT * FROM `cat_profil` WHERE "; 
	$sql .= "nom = '".$attr["nom"]."'";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {
			$profil_id = $row["id"];
	}
	
	$sql = "INSERT INTO `cat_ressource_profil`(`ressource_id`, `profil_id`) VALUES "; 
	$sql .= "(".$ressource_id.",".$profil_id.")";
	mysql_query($sql);
}	

function getActivite ($activite, $ressource_id){
	$attr["nom"] = addslashes($activite->getAttribute("nom"));
	$activites = 	explode(',',$attr["nom"]);
	foreach ($activites as $act){
		$sql = "SELECT * FROM `cat_activite_langagiere` WHERE "; 
		$sql .= "nom LIKE '%".$act."%'";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_array($result)) {
				$activite_id = $row["id"];
		}
		
		$sql = "INSERT INTO `cat_ressource_activite`(`ressource_id`, `activite_id`) VALUES "; 
		$sql .= "(".$ressource_id.",".$activite_id.")";
		mysql_query($sql);
	}
}	
	
	
	


?>	
	