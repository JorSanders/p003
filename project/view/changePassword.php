<?php include("../includes/sentry.php"); ?>
<!DOCTYPE html>
<html>

	<head>
		<title>wachtwoord aanpassen</title>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>

	<body>		
		<?php include_once("../includes/navbar_bootstrap.php"); ?>
		<div class="container">
			<div class="page-header">
				<h3>Wachtwoord wijzigen</h3>
			</div>
			<form class="form-horizontal" role="form" action="../controller/usercontroller.php" method="post">
				<div class="form-group">
					<div class="col-sm-6">
						<?php
						$id = $_SESSION['id'];
						?>			
						<div class="form-group has-feedback">
							<label class="col-sm-4 control-label">Oude wachtwoord:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" type="password" name="old_password" placeholder="Oude wachtwoord"/>
								<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
							</div>
						</div>

						<div class="form-group has-feedback">
							<label class="col-sm-4 control-label">Nieuw wachtwoord:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" type="password" name="new_password1" placeholder="Nieuw wachtwoord"/>
								<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
								</div>
						</div>

						<div class="form-group has-feedback">
							<label class="col-sm-4 control-label">Herhaal nieuw wachtwoord:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" type="password" name="new_password2" placeholder="Herhaal nieuw wachtwoord"/>
								<span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
							</div>
						</div>

						<input type="hidden" name="id" value=" <?php echo $id; ?> "/>
						<input type="hidden" name="action" value="change_password"/>
						<input type="hidden" name="user_id" value="<?php echo $_SESSION["id"];?>"/>
						<div class="form-group has-feedback">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-default btn pull-right">Wachtwoord wijzigen</button>
							</div>
						</div>
						<div class="form-group has-feedback">
							<label class="col-sm-4 control-label"></label>
							<div class="col-sm-6">
								<span class="help-block pull-left">Velden met * dienen ingevuld te worden</span>
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