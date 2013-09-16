<?php 



function afficheArborescence($type){
	$sql = "SELECT * FROM cat_type WHERE "; 
	$sql .= "id = ".$type;
	$result = mysql_query($sql);
	$compteur = mysql_num_rows($result);
	echo '<div class ="span7"><p class ="arborescence muted">';
	echo '<a href="categorie.php">Accueil</a> > ';
	while ($row = mysql_fetch_array($result)) 
	{	
		if (isset($row["parent_id"])){
			$sql_2 = "SELECT * FROM cat_type WHERE "; 
			$sql_2 .= "id = ".$row["parent_id"];
			$result_2 = mysql_query($sql_2);
			while ($row_2 = mysql_fetch_array($result_2)) {	
				if(isset($row_2["parent_id"])){
					$sql_3 = "SELECT * FROM cat_type WHERE "; 
					$sql_3 .= "id = ".$row_2["parent_id"];
					$result_3 = mysql_query($sql_3);
					while ($row_3 = mysql_fetch_array($result_3)) {	
						if(isset($row_3["parent_id"])){
							$sql_4 = "SELECT * FROM cat_type WHERE "; 
							$sql_4 .= "id = ".$row_3["parent_id"];
							$result_4 = mysql_query($sql_4);
							while ($row_4 = mysql_fetch_array($result_4)) {	
								echo '<a href="catalogue.php?type='.$row_4["id"].'">'.$row_4["nom"].'</a> > ';
							}
							echo '<a href="catalogue.php?type='.$row_3["id"].'">'.$row_3["nom"].'</a> > ';
						}
						else {
							echo '<a href="catalogue.php?type='.$row_3["id"].'">'.$row_3["nom"].'</a> > ';						
					
						}
					}	
				}
				echo '<a href="catalogue.php?type='.$row_2["id"].'">'.$row_2["nom"].'</a> > ';
				
			}
		echo '<a href="liste.php?type='.$row["id"].'">'.$row['nom'].'</a>';	
		}
		else {
			echo '<a href="catalogue.php?type='.$row["id"].'">'.$row['nom'].'</a>';
		}
	}	
	echo '</p></div>';
	
}


//Affiche les 6 grandes catégories
function afficheType(){
	echo '<div class ="span7"><p class ="arborescence muted">';
	echo '<a href="categorie.php">Accueil</a>  </p> </div>';
	
	if(isset($_POST["recherche"])){
	afficherRecherche(); 
	}
	else {
		
	
		$sql = "SELECT * FROM cat_type WHERE "; 
		$sql .= "parent_id IS NULL ";
		$result = mysql_query($sql);
		$compteur = mysql_num_rows($result);
		if ($compteur ==0){
			echo "Pas de type";
		}
		else {
			echo '<div class="row">';
		
			
			while ($row = mysql_fetch_array($result)) {	
				echo '<div class="span4">
				<form id="'. $row["id"].'" value="'.$row["nom"].'" name = "type"  method="get" action="catalogue.php">
					<input type="hidden" value="'. $row["id"] .'" name="type" /> 
					<p><button class="btn btn-info" type="submit" value="'.$row["nom"].'"><img src="../img/icon/'.$row["id"].'.png"  class ="icon">'.$row["nom"].'</button></p>
				</form> 
				</div>';
		
			}
			echo "</div>";
		}
	}	
}


	
function afficheSousType(){	
	if(isset($_POST["recherche"])){
		afficheArborescence($_GET['type']);	
		afficherRecherche();
	}
	else {
		$sql = "SELECT * FROM cat_ressource_type WHERE "; 
		$sql .= "type_id = ".$_GET['type'];
		$result = mysql_query($sql);
		$compteur = mysql_num_rows($result);
		if ($compteur !=0){ 
		afficheListe();
		}else {
			afficheArborescence($_GET['type']);	
				
				
			$sql = "SELECT * FROM cat_type WHERE "; 
			$sql .= "parent_id = ".$_GET['type'];
			$result = mysql_query($sql);
			$compteur = mysql_num_rows($result);
			if ($compteur !=0){ 
				echo '<div class = "row">';
				while ($row = mysql_fetch_array($result)) {	
					echo '<div class="span3">';
					
					$sql_parent = "SELECT * FROM cat_type WHERE "; 
					$sql_parent .= "parent_id = ".$row["id"];
					$result_parent = mysql_query($sql_parent);
					$compteur_parent = mysql_num_rows($result_parent);
					if ($compteur_parent == 0){
					echo '<div class="btn-group "> <a class="btn btn-info btn-liste" href="liste.php?type='.$row["id"].'">'.$row["nom"].' </a></div>';
					}
					else{
						echo '<div class="btn-group"> 
						<a class="btn btn-info dropdown-toggle btn-liste" data-toggle="dropdown" href="#">';
						echo $row["nom"];
						echo '<span class="caret"></span></a>
						<ul class="dropdown-menu">';
						while ($row_parent = mysql_fetch_array($result_parent)) {		
							$sql_parent2 = "SELECT * FROM cat_type WHERE "; 
							$sql_parent2 .= "parent_id = ".$row_parent["id"];
							$result_parent2 = mysql_query($sql_parent2);
							$compteur_parent2 = mysql_num_rows($result_parent2);
							if ($compteur_parent2 ==0){
								echo '<li><a class="a" href="liste.php?type='.$row_parent["id"].'">'.$row_parent["nom"].' </a></li>';
							}
							else{
								echo '<li class="dropdown-submenu"><a href="#">'.$row_parent["nom"].'</a><ul class="dropdown-menu">';
								while ($row_parent2 = mysql_fetch_array($result_parent2)) {	
									echo '<li> <a href="liste.php?type='.$row_parent2["id"].'">'.$row_parent2["nom"].'</a></li>';	
								}
								echo'</ul>
								</li>';
								
							}
						}
						echo '</ul>
						</div>';
					}
					echo '</div>';
				}
				echo'</div>';
			}
		}	
	}
}

//Affiche la liste des ressource présentes dans une catégorie
function afficheListe(){
	afficheArborescence($_GET['type']);
	if(isset($_POST["recherche"])){
		afficherRecherche();
	}
	else {
	
		$sql = "SELECT * FROM cat_ressource R, cat_ressource_type T WHERE "; 
		$sql .= "T.type_id = ".$_GET['type'];
		$sql .= " AND R.id = T.ressource_id ";
		$result = mysql_query($sql);
		$compteur = mysql_num_rows($result);
		if ($compteur !=0){
		
			echo '<div class ="span9"><p class = "arborescence"> '.$compteur.' résultats</p></div>  <div class ="span7 well content" id = "content">';
			
			while ($row = mysql_fetch_array($result)) {	
				$url = explode ('http://', $row["url"]);
				echo '<div class = "span7 liste"> ';	
				
				
				if (!isset($url[1]) && $row["url"] != ""){
					$url = explode ('www', $row["url"]);
					if (isset($url[1]))
						$url[1] = 'www'.$url[1];
					
				}

				if (isset($url[1])){
					echo '<div class ="span2"> <img src="http://s.wordpress.com/mshots/v1/http%3A%2F%2F'.$url[1].'?w=200&h=125" alt="Image" class = "frame"></div>';
				}
				else{
					echo '<div class ="span2 frame"> Pas de preview</div>';				
				}
				echo '<div class = "span3 nom_ressource"><a href="ressource.php?ressource='.$row["id"].'">'.$row["nom"].'</a></div>';
				echo '</div>';
			}
			echo '<div id="page_navigation"> </div></div>';			
		}
		else {
			echo '<div class = "span7 well"> ';
			echo "<p>Il n'y a pas de ressources dans cette catégorie.</p>";
			echo '</div>';
		
		}
	}	
}

//Affiche la fiche contenant les détails d'une ressource
function afficheRessource(){

	if(isset($_REQUEST["ressource"])){
		$sql = "SELECT * FROM cat_ressource WHERE "; 
		$sql .= "id = ".$_GET['ressource'];
		$result = mysql_query($sql);
		$compteur = mysql_num_rows($result);
		if ($compteur !=0){ 
			echo '<div class = "row">';
			while ($row = mysql_fetch_array($result)) {	
				$sql = "SELECT type_id FROM cat_ressource_type WHERE "; 
				$sql .= "ressource_id = ".$row['id'];
				$result = mysql_query($sql);
				while ($row_arbo = mysql_fetch_array($result)) {
					afficheArborescence($row_arbo["type_id"]);
				}?>
				<div class = "span9 well"> 
					<div > 	
						<h3><?php echo $row["nom"]?></h3>
						<?php
						$url = explode ('http://', $row["url"]);
										
						if (!isset($url[1]) && $row["url"] != ""){
							$url = explode ('www', $row["url"]);
							if (isset($url[1]))
								$url[1] = 'www'.$url[1];
							
						}

						if (isset($url[1])){
							echo '<div class ="span2"> <a href="http://'.$url[1].'"><img src="http://s.wordpress.com/mshots/v1/http%3A%2F%2F'.$url[1].'?w=200&h=125" alt="Image" class = "frame"></a></div>';
						}
						else{
							echo '<div class ="span2 frame"> Pas de preview</div>';				
						}

						?>
					</div>
					<div class="ressource span4"> 
						<ul class ="unstyled">
						 <?php 
						if ($row["repertoire"]==1) echo "<li><strong> Répertoire de ressources </strong></li>"; ?> 
						<li class="liste">  <?php echo $row["description"]?></li>
						<li class="liste"> <?php echo preg_replace ('#(ht{2}ps?:/{2}[^[:blank:]]+)#i', '<a href="\1" target="_blank" title="Aller à l\'URL \1 (nouvelle fenêtre)">\1</a>', $row["url"]);	?></li> 	
												<?php if ($row["version"] !="")
							echo'<li class="liste"> <strong>Auteur : </strong>'.$row["auteur"].'</li>'; ?>
		
						<?php if ($row["version"] !="")
							echo'<li class="liste"> <strong>Version : </strong>'.$row["version"].'</li>'; ?>
						<li class="liste"> <strong>Ressources liées au fonctionnement : </strong> <br/>
						<?php 
						$ressource = str_replace(';','<br />',$row["ressource_fonctionnement"]);
						$ressource = preg_replace ('#(ht{2}ps?:/{2}[^[:blank:]]+)#i', '<a href="\1" target="_blank" title="Aller à l\'URL \1 (nouvelle fenêtre)">\1</a>', $ressource);						
						echo $ressource;
						
						?></li> 	
						<li class="liste"> <strong>Ressources analogues : </strong> <br/><?php 						
						$ressource = str_replace(';','<br />',$row["ressource_analogue"]);
						$ressource = preg_replace ('#(ht{2}ps?:/{2}[^[:blank:]]+)#i', '<a href="\1" target="_blank" title="Aller à l\'URL \1 (nouvelle fenêtre)">\1</a>', $ressource);						
						echo $ressource;?></li> </ul>							
					</div> 
					<div class = "ressource span2">
					<ul class ="unstyled"> 
					<li class > <strong>Langue(s) :</strong> 
					<?php  
						$sql = "SELECT L.nom FROM cat_ressource_langue R, cat_langue L WHERE "; 
						$sql .= "R.ressource_id = ".$row['id'];
						$sql .= " AND R.langue_id = L.id";				
						$result = mysql_query($sql); 
						$compteur = mysql_num_rows($result);
						if ($compteur !=0){ 
							$i = 1;
							while ($row_langue = mysql_fetch_array($result)) {	
								if ($compteur == $i)
									echo $row_langue["nom"];
								else	
									echo $row_langue["nom"].', ';
								$i++; 	
							}
						}
						else {
							echo "Non précisé";
						}						
					?>
					</li> 
					<li> <strong>Pour :</strong>
					<?php
						$sql = "SELECT P.nom FROM cat_ressource_profil R, cat_profil P WHERE "; 
						$sql .= "R.ressource_id = ".$row['id'];
						$sql .= " AND R.profil_id = P.id";				
						$result = mysql_query($sql);
						$compteur = mysql_num_rows($result);
						if ($compteur !=0){ 
							$i = 1;
							while ($row_profil = mysql_fetch_array($result)) {	
								if ($compteur == $i)
									echo $row_profil["nom"];
								else 	
									echo $row_profil["nom"].', ';
								$i++;	
							}
						}	
						else {
							echo "Non précisé";
						}
					?>
					</li>
					<li> <strong>Activité langagière :</strong>
					<?php
						$sql = "SELECT A.nom FROM cat_ressource_activite R, cat_activite_langagiere A WHERE "; 
						$sql .= "R.ressource_id = ".$row['id'];
						$sql .= " AND R.activite_id = A.id";				
						$result = mysql_query($sql);
						$compteur = mysql_num_rows($result);
						if ($compteur !=0){ 
							$i = 1;
							while ($row_activite = mysql_fetch_array($result)) {	
								if ($compteur == $i)
									echo $row_activite["nom"];
								else 	
									echo $row_activite["nom"].', ';
							}
						}	
						else {
							echo "Non précisé";
						}						
					?>
					</ul>
					</div>
				</div>
			</div>	
			<?php
			}
		}
		else{
			echo "<p> Cette ressource n'existe pas.</p>";
		}

	}
}



function afficherRecherche(){  
	$ressources = array(); 
	
	 
	//Recherche par mots clés 
	if(isset($_POST["recherche"]) && $_POST["recherche"] != ""){

	 
		$sql = "SELECT * FROM cat_ressource WHERE "; 
		
		if ($_SESSION["categorie"] != "accueil"){
			$sql .= " id IN (SELECT ressource_id FROM cat_type T, cat_ressource_type R WHERE ";
			$sql .= " ( T.id = ".$_SESSION["categorie"];
			$sql .= " OR T.parent_id = ".$_SESSION["categorie"];
			$sql .= " OR T.parent_id IN (SELECT id FROM cat_type WHERE parent_id = ".$_SESSION["categorie"]." )";
			$sql .= " OR T.parent_id IN (SELECT id FROM cat_type WHERE parent_id IN (SELECT id FROM cat_type WHERE parent_id = ".$_SESSION["categorie"]." )))";
			$sql .= " AND T.id = R.type_id) AND (";		
		}
		

		$sql .= " nom LIKE '%".$_POST['recherche']."%' ";
		$sql .= " OR description LIKE '%".$_POST['recherche']."%' ";
		$sql .= " OR url LIKE '%".$_POST['recherche']."%' ";
		$sql .= " OR auteur LIKE '%".$_POST['recherche']."%' ";	
		$sql .= " OR ressource_analogue LIKE '%".$_POST['recherche']."%' ";	
		$sql .= " OR ressource_fonctionnement LIKE '%".$_POST['recherche']."%' ";
		$sql .= " OR id IN ( SELECT ressource_id FROM cat_ressource_langue R, cat_langue L WHERE L.nom LIKE '%".$_POST['recherche']."%' AND L.id = R.langue_id)  ";
		
		if ($_SESSION["categorie"] != "accueil"){
			$sql .= ")";
		}	
		$sql .= " ORDER BY repertoire DESC ";		
		$result_ressource = mysql_query($sql); 
		$compteur = mysql_num_rows($result_ressource);
		if ($compteur != 0){
			while ($row_ressource = mysql_fetch_array($result_ressource)) {	
				$ressources[] = $row_ressource["id"].';'.$row_ressource["nom"].';'.$row_ressource["url"];
			}
		}
	}
	
	//Recherche par langue
	if (isset($_POST["langue"]) && $_POST["langue"] != ""){
		foreach($_POST["langue"] as $lan) {
			$sql = " SELECT id, nom, url FROM cat_ressource_langue L, cat_ressource R WHERE ";
			$sql .= " L.langue_id = ".$lan." AND L.ressource_id = R.id  ";  
			
			if ($_SESSION["categorie"] != "accueil"){
				$sql .= " AND id IN (SELECT ressource_id FROM cat_type T, cat_ressource_type R WHERE ";
				$sql .= " ( T.id = ".$_SESSION["categorie"];
				$sql .= " OR T.parent_id = ".$_SESSION["categorie"];
				$sql .= " OR T.parent_id IN (SELECT id FROM cat_type WHERE parent_id = ".$_SESSION["categorie"]." )";
				$sql .= " OR T.parent_id IN (SELECT id FROM cat_type WHERE parent_id IN (SELECT id FROM cat_type WHERE parent_id = ".$_SESSION["categorie"]." )))";
				$sql .= " AND T.id = R.type_id)";		
			}
		$sql .= " ORDER BY repertoire DESC ";				
		
			$result = mysql_query($sql); 
			if (empty($ressources)){
				while ($row = mysql_fetch_array($result)) {	
					$ressources[] = $row["id"].';'.$row["nom"].';'.$row["url"]; 
				}			
			}
			else{
				while ($row = mysql_fetch_array($result)) {	
					$ressources_langues[] = $row["id"].';'.$row["nom"].';'.$row["url"];
				}
				$ressources = array_intersect ($ressources, $ressources_langues); 	
			}
		}
	
	}
	
	//Recherche par profil
	if (isset($_POST["profil"]) && $_POST["profil"] != ""){
	$ressource_profil= array();
		foreach($_POST["profil"] as $pro) {
			$sql = " SELECT id, nom, url FROM cat_ressource_profil P, cat_ressource R WHERE ";
			$sql .= " P.profil_id = ".$pro." AND P.ressource_id = R.id  "; 
	

			if ($_SESSION["categorie"] != "accueil"){
				$sql .= " AND id IN (SELECT ressource_id FROM cat_type T, cat_ressource_type R WHERE ";
				$sql .= " ( T.id = ".$_SESSION["categorie"];
				$sql .= " OR T.parent_id = ".$_SESSION["categorie"];
				$sql .= " OR T.parent_id IN (SELECT id FROM cat_type WHERE parent_id = ".$_SESSION["categorie"]." )";
				$sql .= " OR T.parent_id IN (SELECT id FROM cat_type WHERE parent_id IN (SELECT id FROM cat_type WHERE parent_id = ".$_SESSION["categorie"]." )))";
				$sql .= " AND T.id = R.type_id) ";		
			}
			$sql .= " ORDER BY repertoire DESC ";				
			$result = mysql_query($sql); 
			
			
			if (empty($ressource_profil)){
				while ($row = mysql_fetch_array($result)) {	
					$ressource_profil[] = $row["id"].';'.$row["nom"].';'.$row["url"]; 
				}
				//print_r($ressource_profil);
			}
			else{		
				while ($row = mysql_fetch_array($result)) {	
					$ressource_profil2[] = $row["id"].';'.$row["nom"].';'.$row["url"];
				}
				$ressource_profil = array_intersect ($ressource_profil, $ressource_profil2);	
			}
			unset($ressource_profil2);
		}	
		
		if (empty($ressources)){
			$ressources = $ressource_profil; 
		}
		else{			
			$ressources = array_intersect ($ressources, $ressource_profil); 
		}
	}	
	
	//Recherche par activité langagiere
	if (isset($_POST["activite"]) && $_POST["activite"] != ""){
	$ressource_activite = array();
		foreach($_POST["activite"] as $act) {
			$sql = " SELECT id, nom, url FROM cat_ressource_activite A, cat_ressource R WHERE ";
			$sql .= " A.activite_id = ".$act." AND A.ressource_id = R.id  "; 
	

			if ($_SESSION["categorie"] != "accueil"){
				$sql .= " AND id IN (SELECT ressource_id FROM cat_type T, cat_ressource_type R WHERE ";
				$sql .= " ( T.id = ".$_SESSION["categorie"];
				$sql .= " OR T.parent_id = ".$_SESSION["categorie"];
				$sql .= " OR T.parent_id IN (SELECT id FROM cat_type WHERE parent_id = ".$_SESSION["categorie"]." )";
				$sql .= " OR T.parent_id IN (SELECT id FROM cat_type WHERE parent_id IN (SELECT id FROM cat_type WHERE parent_id = ".$_SESSION["categorie"]." )))";
				$sql .= " AND T.id = R.type_id) ";		
			}
			
			$sql .= " ORDER BY repertoire DESC ";				
			$result = mysql_query($sql); 
			
			
				
			if (empty($ressource_activite)){
				while ($row = mysql_fetch_array($result)) {	
					$ressource_activite[] = $row["id"].';'.$row["nom"].';'.$row["url"];
				}
			}
			else{		
				while ($row = mysql_fetch_array($result)) {	
					$ressource_activite2[] = $row["id"].';'.$row["nom"].';'.$row["url"];
				}
				$ressource_activite = array_intersect ($ressource_activite, $ressource_activite2); 	
			}
			unset($ressource_activite2);
		}	
		
		if (empty($ressources)){
			$ressources = $ressource_activite; 
		}
		else{			
			$ressources = array_intersect ($ressources, $ressource_activite); 
		}
	}	
	

	//Affichage du résultat 
	$result = array_unique($ressources);
	 echo '<div class ="span7 well">';
	if (empty($result)){
		echo '<p class = "arborescence">Aucun résultat</p>';
	}
	else {
		echo '<p class = "arborescence"> '.count($result).' résultats </p>';
		echo ' <div  class= "row liste content">';		
		foreach ($result as $ressource){
			$res = explode (';', $ressource);
			$url = explode ('http://', $res[2]);	

			echo '<div class="liste row">';
			if (!isset($url[1]) && $res[2] != ""){
				$url = explode ('www', $res[2]);
				$url[1] = 'www'.$url[1];
			}
			else if ($res[2] == ""){
				echo '<div class ="span2 frame"> Pas de preview</div>';				
			}
			if (isset($url[1])){
				echo '<div class ="span2"> <img src="http://s.wordpress.com/mshots/v1/http%3A%2F%2F'.$url[1].'?w=200&h=125" alt="Image" class = "frame"></div>';
			}
			echo '<div class = "span3 nom_ressource"><a href="ressource.php?ressource='.$res[0].'">'.$res[1].'</a></div></div>';
		
		}
		echo'</div>';
		echo '<div id="page_navigation"> </div>';	
		
	}

	echo '</div>';
}

?>