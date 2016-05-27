<?php include("../includes/sentry.php"); ?>
<!DOCTYPE html>
<html>
    <head>
    	<?php 
		include_once("../includes/head_bootstrap.html"); 
		if (!isset($_SESSION['roleList']) &&
			!isset($_SESSION['userList']))
		{
			header ('location: ../controller/roleController.php?action=findAllRole');
		}

		?> 
		
    </head>

    <body>
    	<?php include_once("../includes/navbar_bootstrap.php"); ?>	
		<div class="container">
			<div class="page-header">
				<h3>Gebruiker aan rol koppelen</h3>
			</div>
			<form class="form-horizontal" role="form" action="../controller/roleController.php" method="post">
				<div class="form-group">
					<label class="col-sm-0 control-label"></label>
					<div class="col-sm-6">			
						<input name="action" type="hidden" value="saveUserRole" />
						<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Gebruiker:</label>
							<div class="col-sm-4">	   
								<select name="userId" class="form-control" id="focusedInput">
								<?php
								require_once("../classes/model/userclass.php");								
								$userList = unserialize ($_SESSION['userList']);
								unset($_SESSION['userList']);
								foreach ($userList as $user) {
									echo "<option value = ' ";
									echo $user->getId();
									echo " '>";
									echo $user->getName();
									echo "</option>";
									echo "<br>";
								}								
								?> 
								</select>
							</div>
						</div>
					
						<div class="form-group has-feedback">	
							<label class="col-sm-3 control-label">Rol:</label>
							<div class="col-sm-4">
								<select name="roleId" class="form-control" id="focusedInput">
									<?php
									require_once("../classes/model/roleClass.php");
									$roleList = unserialize ($_SESSION['roleList']);
									unset($_SESSION['roleList']);	
									foreach ($roleList as $role) {
										echo "<option value = ' ";
										echo $role->getId();
										echo " '>";
										echo $role->getName();
										echo "</option>";
										echo "<br>";
									}
									
									?> 
								</select>
							</div>
						</div>
							
						<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Begin datum:</label>
							<div class="col-sm-4">
								<input class="form-control" id="focusedInput" type="date" name="start_date">
							</div>
						</div>

						<div class="form-group has-feedback">	
							<label class="col-sm-3 control-label">Eind datum:</label>
							<div class="col-sm-4">
								<input class="form-control" id="focusedInput" type="date" name="end_date">
							</div>
						</div>
						
						<div class="form-group has-feedback">
							<div class="col-sm-7">
								<button type="submit" class="btn btn-default pull-right">Koppelen</button>
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