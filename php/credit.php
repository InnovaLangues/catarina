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
	<link href="../css/catarina.css" rel="stylesheet" type="text/css">

    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

  </head>

  <body>
  	<div class = "general">
		<div class="container contain">
	  <?php include"header.inc.php"; ?>
	  <?php include("credit.inc.php")?>
	  
		<?php include("footer.inc.php"); ?> 
		</div>
	</div> 
	
	
	
	

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js "></script>

  </body>
</html>
