<!DOCTYPE html>
<html>
    <head>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>

    <body>
		<div class= "container">
			<div class= "page-header">
				<h3>Gebruiker aan rol koppelen</h3>
			</div>
			<?php include_once("../includes/navbar_bootstrap.php"); ?> 
			<div id="content">
				<form method="post" action='../controller/roleController.php?action=findAllRole' class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-sm-10">
							<label class="col-sm-6 control-label">Klik hier om nog een gebruiker aan een rol te koppelen:</label>
							<button class="btn btn-default" name="submit" type="submit">Gebruiker aan rol koppelen</button>
						</div>
					</div>
				</form>

				<form method="post" action='../view/AllRolesList.php' class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-sm-10">
							<label class="col-sm-6 control-label">Klik hier voor het rollenoverzicht:</label>
							<button class="btn btn-default" name="submit" type="submit">Rollenoverzicht</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
    </body>
	<footer>
		<?php include_once("../includes/footer_bootstrap.html"); ?>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
	</footer>
</html>
