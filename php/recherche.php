<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
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
		
	<link href="../css/select2.css" rel="stylesheet"/>

  </head>

  <body>
    <div class="container">
	  <?php include"header.inc.php"; ?>
	  <?php include("recherche.inc.php");?>
	  
		<?php include("footer.inc.php"); ?> 
    </div> 
	
	
	
	

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-2.0.2.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js "></script>
	
	<script src="../js/select2-3.4.0/select2.js"></script>
	 <script>
	  $(document).ready(function() { $("#langue").select2();  });
	</script>

  </body>
</html>
