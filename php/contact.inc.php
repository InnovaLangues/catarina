    <?php

    // destinataire est l'adresse mail
    $destinataire = 'surya.dersoir@e.u-grenoble3.fr';
          
    // Action du formulaire 
    $form_action = '';
     
    // Messages de confirmation du mail
    $message_envoye = "Votre message nous est bien parvenu !";
    $message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
     
    // Message d'erreur du formulaire
    $message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";
     

	 
	 
	 
    
    // Cette fonction sert à nettoyer et enregistrer un texte
    
    function Rec($text)
    {
		$text = htmlspecialchars(trim($text), ENT_QUOTES);
		if (1 === get_magic_quotes_gpc())
		{
			$text = stripslashes($text);
		}
		 
		$text = nl2br($text);
		return $text;
    };
     
    
    //Cette fonction sert à vérifier la syntaxe d'un email

    function IsEmail($email)
    {
		$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
		return (($value === 0) || ($value === false)) ? false : true;
    }
     
    // formulaire envoyé, on récupère tous les champs.
    $nom = (isset($_POST['nom'])) ? Rec($_POST['nom']) : '';
    $email = (isset($_POST['email'])) ? Rec($_POST['email']) : '';
    $objet = (isset($_POST['objet'])) ? Rec($_POST['objet']) : '';
    $message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
     
    // On va vérifier les variables et l'email
    $email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
    $err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin
     
    if (isset($_POST['envoi']))
    {
		if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
		{
			$headers = 'From:'.$nom.' <'.$email.'>' . "\r\n";			 
			 
			// Remplacement de certains caractères spéciaux
			$message = str_replace("&#039;","'",$message);
			$message = str_replace("&#8217;","'",$message);
			$message = str_replace("&quot;",'"',$message);
			$message = str_replace('&lt;br&gt;','',$message);
			$message = str_replace('&lt;br /&gt;','',$message);
			$message = str_replace("&lt;","&lt;",$message);
			$message = str_replace("&gt;","&gt;",$message);
			$message = str_replace("&amp;","&",$message);
			 
			// Envoi du mail
			if (mail($destinataire, $objet, $message, $headers))
			{
				echo '<p><span class="label label-success">'.$message_envoye.'</span></p>';
			}
			else
			{
				echo '<p><span class="label label-important">'.$message_non_envoye.'</span></p>';
			};
		}
		else
		{
			// une des 3 variables (ou plus) est vide ...
			echo '<p><span class="label label-warning">'.$message_formulaire_invalide.'</span></p>';
			$err_formulaire = true;
		};
    }; // fin du if (isset($_POST['envoi']))
     

		// afficher le formulaire
	echo '
	<div class =" span7 well">
		<form id="contact" method="post" action="'.$form_action.'">
		<fieldset><legend>Vos coordonnées</legend>
		<p><label for="nom">Nom :</label><input type="text" id="nom" name="nom" value="'.stripslashes($nom).'"  /></p>
		<p><label for="email">Email :</label><input type="text" id="email" name="email" value="'.stripslashes($email).'"  /></p>
		</fieldset>
		 
		<fieldset><legend>Votre message</legend>
		<p><label for="objet">Objet :</label>
		<select id="objet" name="objet">
			<option value = ""></option>
			<option value = "[Catarina]Avis"> Avis</option>
			<option value = "[Catarina]Question"> Question</option>
			<option value = "[Catarina]Proposition de categorie"> Proposition de catégorie</option>			
		</select></p>
		<p><label for="message">Message :</label><textarea id="message" name="message" cols="30" rows="8">'.stripslashes($message).'</textarea></p>
		</fieldset>
		<div> 
			<button class="btn btn-warning search " type="submit" name ="envoi" >Envoyer <i class="icon-white icon-ok"></i></button>
		</div>
		</form>
	</div>';
  
    ?>