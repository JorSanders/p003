<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
    	<?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>

    <body>
            <?php include_once("../includes/navbar_bootstrap.html"); ?>
        <div class="container">
			<div class="page-header">
				<h3>Les en code</h3>
			</div>
			<div class="form-group">
      				<div class="col-sm-6">
				 
			
			<form action="../controller/usercontroller.php" method="post">
			
             <?php 
				echo require_once("../classes/model/userclass.php");
				//als in de sessie de user is gezet haal dan de user op
				if (isset($_SESSION['User'])){
					$User = unserialize($_SESSION['User']);
					//unset de user uit de session zodat als de pagina word gerefreshed de gegevens opnieuw worden opgehaald
					unset($_SESSION['User']);				

				}	else { //zo niet stuur door naar de controller om de user op te halen
					header("Location: ../controller/usercontroller.php?action=getUser&id={$_GET['id']}");
				}
			 ?>			     

                  <input type="hidden" name="id" value="<?php echo $User->getId(); ?>">
                  <input type="hidden" name="action" value="update">
                  	<div class="form-group has-feedback">
                   		<label class="col-sm-3 control-label">Naam:</label>
                   		<div class="col-sm-4">
                  			<input class="form-control" id="focusedInput" name="name" type="text" value="<?php echo $User->getName(); ?>"/>
                  		</div>
                  	</div>
                  	<div class="form-group has-feedback">
                   		<label class="col-sm-3 control-label">Wachtwoord:</label>
                   		<div class="col-sm-4">
                  <input class="form-control" id="focusedInput" name="password" type="text" value="<?php echo $User->getPassword(); ?>"/>
              			</div>
          			</div>
          			<div class="form-group has-feedback">
                   		<label class="col-sm-3 control-label">E-mail:</label>
                   		<div class="col-sm-4">
				  <input class="form-control" id="focusedInput" name="email" type="text" value="<?php echo $User->getEmail(); ?>"/>
						</div>
					</div>
					<div class="form-group has-feedback">
                   		<label class="col-sm-3 control-label">Code:</label>
                   		<div class="col-sm-4">
				  <input class="form-control" id="focusedInput" name="code" type="text" value="<?php echo $User->getCode(); ?>"/>
						</div>
					</div>
					<div class="form-group has-feedback">
                   		<label class="col-sm-3 control-label">Active:</label>
                   		<div class="col-sm-4">
				  <input class="form-control" id="focusedInput" name="active" type="text" value="<?php echo $User->getActive(); ?>"/>
						</div>
					</div>
                  <button type="submit" class="btn btn-default btn pull-right">User wijzigen</button>
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