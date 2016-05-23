<!DOCTYPE html>
<html>

<head>
	<title>Rol toevoegen</title>
	 <?php include_once("../includes/head_bootstrap.html"); ?> 
</head>
	
	<body>
		<?php include_once("../includes/navbar_bootstrap.html"); ?> 
		<div class="container">
			<div class="page-header">
				<h3>Rol toevoegen</h3>
			</div>
			<form class="form-horizontal" role="form" action="../controller/roleController.php" method="post">
    			<div class="form-group">
      				<div class="col-sm-6">
	
				<div class="form-group">
					<label class="col-sm-3 control-label">Rol toevoegen:</label>
					<div class="col-sm-6">
						<input class="form-control" id="focusedInput" type="text" name="role" placeholder="Rol toevoegen" required/>
					</div>
				</div>
				<input name="action" type="hidden" value="insertRole">
				<div class="form-group has-feedback">
					<div class="col-sm-9">
						<input class="btn btn-default pull-right" name="submit" type="submit" value="Rol toevoegen">
					</div>
				</div>
			</form>

		</div>
	</div>
</div>

	<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
	<?php include_once("../includes/test_bootstrap.html"); ?> 
		

	</body>








</html>