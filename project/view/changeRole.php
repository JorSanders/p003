<!DOCTYPE html>
<html>

<head>
	<title>Update role</title>
	<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

	<body>
		<?php include_once("../includes/navbar_bootstrap.html"); ?>
		
		<div class="container">
			<div class="page-header">
				<h3>Rol wijzigen</h3>
			</div>
			<form class="form-horizontal" role="form" action="../controller/usercontroller.php" method="post">
    			<div class="form-group">
      				<div class="col-sm-6">
					<?php
						$id = 1;
					?>
			
					<input type="hidden" name="id" value=" <?php echo $id; ?> "/>
					<input type="hidden" name="action" value="updateRole"/>
					<div class="form-group has-feedback">
						<label class="col-sm-3 control-label">Rol wijzigen:</label>
						<div class="col-sm-4">
							<input class="form-control" id="focusedInput" type="text" name="Role" placeholder="Rol wijzigen" required /><br>
						</div>
					</div>
					<div class="form-group has-feedback">
						<div class="col-sm-7">
							<button type="submit" class="btn btn-default pull-right">Rol wijzigen</button>
						</div>
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