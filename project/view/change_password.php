<!DOCTYPE html>
<html>

<head>
	<title>wachtwoord aanpassen</title>
	<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

	<body>
		
		<?php include_once("../includes/navbar_bootstrap.html"); ?>
		<div class="container">
			<br></br>
			<h2>Wachtwoord wijzigen</h2>
			<form class="form-horizontal" role="form" action="../controller/usercontroller.php" method="post">
    			<div class="form-group">
      				<div class="col-sm-6">
		<?php
			$id = 1;
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
			<div class="form-group has-feedback">
				<div class="col-sm-8">
					<button type="submit" class="btn btn-default btn pull-right">Wachtwoord wijzigen</button>
				</div>
			</div>
			<span class="help-block pull-left">Velden met * dienen ingevuld te worden</span>

		</form>
	</div>
 </div>
</div> 
</div>
	<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
	<?php include_once("../includes/test_bootstrap.html"); ?> 
	

	</body>





</html>