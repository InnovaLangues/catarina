<?php

if (isset($_POST["nom"])){
ajout();
}else{
afficheAjout();
}


function afficheAjout(){
?>
<p class ="arborescence muted">Indexation</p>
<div class ="well ajout ">
	<form class="form ajout" id="ajout" action = "" method ="post" onsubmit="return verifForm(this)">
		<label >Nom de la ressource :</label>
		<input class="input-xxxlarge" type="text"   name ="nom" value = "<?php 
			if(isset($_POST["nom"]) ) {
				echo $_POST["nom"];
			}?>"	>
		<br/>	


		<label >URL éventuelle :</label>
		<input class="input-xlarge" type="text" name ="url" value = "<?php 
			if(isset($_POST["url"]) ) {
				echo $_POST["url"];
			}?>"	> <span class="help-inline">[Accès en ligne ou via téléchargement]</span>
		<br/>		
		
		<label >Type de ressource:</label>
		<select name="type">
			<option value="ressource">Ressource seule</option>
			<option value="repertoire">Répertoire de ressources similaires</option>
		</select>
			
		
		<label> Catégorie : </label>
		<div id="categorie"><div class= "accordion-group">
		<?php 
			$sql = "SELECT * FROM cat_type WHERE parent_id IS NULL ORDER BY nom"; 
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result)) {
				$sql = "SELECT * FROM cat_type WHERE parent_id = ".$row["id"]." ORDER BY nom"; 
				$result2 = mysql_query($sql); 
				$compteur = mysql_num_rows($result2);
				if ($compteur !=0){
				echo ' <div class="accordion-heading"> <a class="accordion-toggle accordion_cat" href="#'.$row["id"].'" data-toggle="collapse" data-parent="#categorie">';
				echo '<label for="'.$row["nom"].'" class ="radio"> '.$row["nom"].'</label>';
				echo '</a> </div>';
				echo ' <div class="collapse" id="'.$row["id"].'"><div class="accordion-inner" > ';
					while ($row2 = mysql_fetch_array($result2)) {
						echo '<label for="'.$row2["nom"].'" class ="radio"> <input type="radio" name ="categorie" value="'.$row2["id"].'"/> '.$row2["nom"].'</label>';			
					}
				echo  '</div></div>';
	
				}
				else{
				echo ' <div class="accordion-heading"> <a class="accordion-toggle accordion_cat" href="#'.$row["id"].'" data-toggle="collapse" data-parent="#categorie">';
				echo '<label for="'.$row["nom"].'" class ="radio"> '.$row["nom"].'</label>';		
				echo '</a> </div>';
				echo ' <div class="collapse" id="'.$row["id"].'"><div class="accordion-inner" > ';	
				echo '<label for="'.$row["nom"].'" class ="radio"> <input type="radio" name ="categorie" value="'.$row["id"].'"/> '.$row["nom"].'</label>';	
				echo  '</div></div>';				
				}
				
			}					
		?>
		</div>
		<span class="help-inline">Pour suggérer une nouvelle catégorie, merci de remplir le formulaire de contact (bas de page)</span>
		</div>

		
		
		<label >Brève description :</label>
		<textarea name ="description" value = "<?php 
			if(isset($_POST["description"]) ) {
				echo $_POST["description"];
			}?>" ></textarea>
		<br/>	
	
		<div class= "recherche">
		 <label>Public(s) privilégié(s) :</label>
            <select id="pour" name ="profil[]" multiple >
				<?php 
					$sql = "SELECT * FROM cat_profil ORDER BY nom"; 
					$result = mysql_query($sql);
					while ($row = mysql_fetch_array($result)) {
						echo '<option value = "'.$row["id"].'"';
						
						if(isset($_POST["profil"]) ) {
							foreach($_POST["profil"] as $pro) {
								if($pro == $row["id"]){
									echo 'selected="selected"';
								}
							}
						}	
						echo ' >'.$row["nom"].'</option>';
					}					
				?>
            </select>
		</div>  
		<div class="recherche  ">
			<label>Langue(s) concernée(s) :</label>
            <select id="langue" name ="langue[]" multiple >
				<?php 
					$sql = "SELECT * FROM cat_langue ORDER BY nom"; 
					$result = mysql_query($sql);
					while ($row = mysql_fetch_array($result)) {
						echo '<option value = '.$row["id"].' '; 
						if(isset($_POST["langue"]) ) {
							foreach($_POST["langue"] as $lan) {
								if($lan == $row["id"]){
									echo 'selected="selected"';
								}
							}
						}	
						echo'>'.$row["nom"].'</option>';
					}					
				?>
            </select>
		</div>
		<div class= "recherche">
			<label>Activité(s) langagière(s) travaillée(s) :</label>
            <select id="activite" name ="activite[]" multiple >
				<?php 
					$sql = "SELECT * FROM cat_activite_langagiere ORDER BY nom"; 
					$result = mysql_query($sql);
					while ($row = mysql_fetch_array($result)) {
						echo '<option value = "'.$row["id"].'"';
						if(isset($_POST["activite"]) ) {
							foreach($_POST["activite"] as $act) {
								if($act == $row["id"]){
									echo 'selected="selected"';
								}
							}
						}	
						echo'>'.$row["nom"].'</option>';
					}					
				?>
				<option value="0">Sans objet</option>
            </select>
		</div> 
	
		<label >Auteur :</label>
		<input class="input-xxxlarge" type="text" name ="auteur" value = "<?php 
			if(isset($_POST["auteur"]) ) {
				echo $_POST["auteur"];
			}?>"	>
		<br/>	
		
		<label >Version/Année :</label>
		<input class="input-xxxlarge" type="text" name ="version" value = "<?php 
			if(isset($_POST["version"]) ) {
				echo $_POST["version"];
			}?>"	>
		<br/>
		

		<label >Ressource(s) associée(s) à son fonctionnement ou ses usages : </label>
		<textarea name ="ressource_fonctionnement" value = "<?php 
			if(isset($_POST["ressource_fonctionnement"]) ) {
				echo $_POST["ressource_fonctionnement"];
			}?>"	></textarea>
		<br/>	
		
		<label >Ressource(s) analogue(s) :</label>
		<textarea  name ="ressource_analogue" value = "<?php 
			if(isset($_POST["ressource_analogue"]) ) {
				echo $_POST["ressource_analogue"];
			}?>"	></textarea>
		<br/>	
		
		<div class="row-fluid">
			<button class="btn btn-warning search pull-right" type="submit">OK <i class="icon-white icon-ok"></i></button>
		</div>	

	</form>
	
	
</div>	
<?php
}

function  ajout(){
	$nom = addslashes($_POST["nom"]);
	$url = addslashes ($_POST["url"]);
	$description = addslashes ($_POST["description"]);
	if (isset($_POST["version"]))
		$version = $_POST["version"];
	else 
		$version  = 1; 
	
	if (isset($_POST["auteur"]))
		$auteur = addslashes($_POST["auteur"]);
	else 
		$auteur = "Anonyme";

	if (isset($_POST["ressource_fonctionnement"]))
		$fonctionnement = addslashes($_POST["ressource_fonctionnement"]);
	else 
		$fonctionnement = "";	

	if (isset($_POST["ressource_analogue"]))
		$analogue = addslashes($_POST["ressource_analogue"]);
	else 
		$analogue = "";			
	
	
	if ($_POST["type"]== "ressource")
		$repertoire = 0; 
	else 
		$repertoire = 1;

		
	//Création de la note 
	$sql = "INSERT INTO `cat_note`(`note`, `nb_votant`) VALUES "; 
	$sql .= "(2.5, 0)";
	mysql_query($sql);
	$note_id = mysql_insert_id();	
	
	
	//Enregistrement ressource 
	$sql = 'INSERT INTO `cat_ressource`(`nom`, `url`, `auteur`, `version`, `description`, `repertoire`, `ressource_fonctionnement`, `ressource_analogue`, `note_id`) VALUES ("'; 
	$sql .= $nom.'", "'.$url.'","'.$auteur.'","'.$version.'","'.$description.'",'.$repertoire.',"'.$fonctionnement.'","'.$analogue.'" , '.$note_id.')';
	if (mysql_query($sql)){
	$ressource_id = mysql_insert_id();
	header("Location: ressource.php?ressource=".$ressource_id);
	}

	//Enregistrement langue 
	getLangue($ressource_id);
	
	//Enregistrement profil 
	getProfil($ressource_id);
	
	//Enregistrement catégorie
	getCategorie($ressource_id);
	
	
	//Enregistrement activité langagière 
	getActivite($ressource_id);

}




function getLangue ($ressource_id){	
	if (isset($_POST["langue"])){
		foreach ($_POST["langue"] as $lan){
			$sql = "SELECT * FROM `cat_langue` WHERE "; 
			$sql .= "id =".$lan."";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result)) {
				$langue_id = $row["id"];
			}
					
			$sql = "INSERT INTO `cat_ressource_langue`(`ressource_id`, `langue_id`) VALUES "; 
			$sql .= "(".$ressource_id.",".$langue_id.")";
			mysql_query($sql);
		}	
	}	
	
}


function getCategorie ($ressource_id){
	$sql = "SELECT * FROM `cat_type` WHERE "; 
	$sql .= "id = ".$_POST["categorie"];
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {
		$cat_id = $row["id"];
	}
	$sql = "INSERT INTO `cat_ressource_type`(`ressource_id`, `type_id`) VALUES "; 
	$sql .= "(".$ressource_id.",".$cat_id.")";
	mysql_query($sql);
	
}	




function getProfil ($ressource_id){
	if (isset($_POST["profil"])){
		foreach ($_POST["profil"] as $profil){
			$sql = "SELECT * FROM `cat_profil` WHERE "; 
			$sql .= "id = '".$profil."'";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result)) {
					$profil_id = $row["id"];
			}
			
			$sql = "INSERT INTO `cat_ressource_profil`(`ressource_id`, `profil_id`) VALUES "; 
			$sql .= "(".$ressource_id.",".$profil_id.")";
			mysql_query($sql);
		}
	}	
}	

function getActivite ($ressource_id){
	if (isset($_POST["activite"])){
		foreach ($_POST["activite"] as $act){
			$sql = "SELECT * FROM `cat_activite_langagiere` WHERE "; 
			$sql .= "id = ".$act."";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result)) {
					$activite_id = $row["id"];
			}
			
			$sql = "INSERT INTO `cat_ressource_activite`(`ressource_id`, `activite_id`) VALUES "; 
			$sql .= "(".$ressource_id.",".$activite_id.")";
			mysql_query($sql);
		}
	}	
}	



?>

