<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
   <meta charset="utf-8">
    <title>Catarina</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php include ("connexion.inc.php"); ?>

    <!-- Le styles -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap_2_1.min.css" rel="stylesheet" type="text/css">
	<link href="../css/catarina.css" rel="stylesheet" type="text/css">
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
		
	<link href="../css/select2.css" rel="stylesheet"/>
	
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />	
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>



	</head>

  <body>
	<div class = "general">
		<div class="container contain">
		  <?php include"header.inc.php"; ?>

			<div class="span3">
			<?php  include("recherche.inc.php");?>
			</div>
			<div class="span8">
			<?php include("catalogue.inc.php");
			afficheSousType();?>
			</div>
			
			<?php include("footer.inc.php"); ?> 

		</div> 
	</div>	


	
	    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-2.0.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js "></script>
		<script src ="../js/function.js"></script>
	<script src="../js/select2-3.4.0/select2.js"></script>
	 <script>
	  $(document).ready(function() { $("#pour").select2(); $("#langue").select2();$("#activite").select2();  });
	</script>
	
	</body>
</html>	

