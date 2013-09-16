
<div class ="well recherche ">
	<form class="form recherche" action = "" method ="post">
	
		<div class="row-fluid">
			<button class="btn btn-warning search pull-right" type="submit">OK  <i class="icon-white icon-search"></i></button>
		</div>
		<div class="ui-widget row-fluid" >
			<label >Chercher :</label>
			<input type="text" class="search-query" id="tags" name ="recherche" value = "<?php 
							if(isset($_POST["recherche"]) ) {
								echo $_POST["recherche"];
							}?>"	>
		</div>
	
	<br/>			  

	<div class= "recherche">
		 <label>Profil(s) :</label>

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
	
        <label>Langue(s) :</label>

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
		
			 <label>Activité(s) langagière(s) :</label>

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

            </select>
	  
	  
	</div>  

	</form>
	
	
</div>	
