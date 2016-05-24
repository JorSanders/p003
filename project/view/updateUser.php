<?php include("../includes/sentry.php"); ?>
<!DOCTYPE html>
<html>
    <head>
	<?php 
	include_once("../includes/head_bootstrap.html");
	if (!isset($_SESSION['User'])){
		header("Location: ../controller/usercontroller.php?action=getUser&id={$_GET['id']}");
	}
	?> 
	
    </head>

    <body>
        <?php include_once("../includes/navbar_bootstrap.php"); ?>
        <div class="container">
			<div class="page-header">
				<h3>Gebruiker aanpassen</h3>
			</div>
			<div class="form-group">
      			<div class="col-sm-6">
			
					<form action="../controller/usercontroller.php" method="post" class="form-horizontal" role="form">
						<?php 
						require_once("../classes/model/userclass.php");
						$User = unserialize($_SESSION['User']);
						//unset de user uit de session zodat als de pagina word gerefreshed de gegevens opnieuw worden opgehaald
						unset($_SESSION['User']);                
						?>			     

						<input type="hidden" name="id" value=<?php echo $User->getId(); ?>>
						<input type="hidden" name="action" value="update">
						<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Naam:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" name="name" type="text" value="<?php echo $User->getName(); ?>"/>
							</div>
						</div>
						<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Wachtwoord:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" name="password" type="text" value="<?php echo $User->getPassword(); ?>"/>
							</div>
						</div>
						<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">E-mail:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" name="email" type="text" value="<?php echo $User->getEmail(); ?>"/>
							</div>
						</div>
						<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Code:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" name="code" type="text" value="<?php echo $User->getCode(); ?>"/>
							</div>
						</div>
						<div class="form-group has-feedback">
							<label class="col-sm-3 control-label">Active:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" name="active" type="text" value="<?php echo $User->getActive(); ?>"/>
							</div>
						</div>
						<div class="form-group has-feedback">
							<div class="col-sm-9">
								<button type="submit" class="btn btn-default btn pull-right">User wijzigen</button>
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