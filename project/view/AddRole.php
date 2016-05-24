<?php include("../includes/sentry.php"); ?>
<!DOCTYPE html>
<html>

	<head>
		<title>Rol toevoegen</title>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>
		
	<body>
		<?php include_once("../includes/navbar_bootstrap.php"); ?> 
		<div class="container">
			<div class="page-header">
				<h3>Rol toevoegen</h3>
			</div>
			<form class="form-horizontal" role="form" action="../controller/roleController.php" method="post">
				<div class="form-group">
					<div class="col-sm-6">	
						<div class="form-group">
							<label class="col-sm-3 control-label">Rol naam:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" type="text" name="role" placeholder="Projectmanager" required/>
							</div>
						</div>
						<input name="action" type="hidden" value="insertRole">
						<div class="form-group has-feedback">
							<div class="col-sm-9">
								<button class="btn btn-default glyphicon glyphicon-plus pull-right " name="submit" type="submit">Toevoegen</button>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
	</body>
</html>