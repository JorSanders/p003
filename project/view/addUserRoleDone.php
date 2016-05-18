<!DOCTYPE html>
<html>
    <head>
	<?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>

    <body>
		<div class= "container">
			<div class= "page-header">
				<h3> Voeg hier je les toe aan een docent.</h3>
			</div>
		<?php include_once("../includes/navbar_bootstrap.html"); ?> 
			<div id="content">
				<h3>Gebruiker is aan rol gekoppeld </h3>
				  <br><br>

				<form method="post" action='../controller/roleController.php?action=findAllRole' >
					Klik hier om nog een gebruiker aan een rol te koppelen:<br>
					<input type="submit" name="Go">
				</form>
				
				<form method="post" action='../view/overview_combination.php' >
					Klik hier voor het overzicht:<br>
					<input type="submit" name="Go">
				</form>
			</div>
		</div>
		
    </body>
	<footer>
		<?php include_once("../includes/footer_bootstrap.html"); ?>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
	</footer>
</html>
