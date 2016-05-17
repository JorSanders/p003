<?php 
session_start(); 
include("menu.php");
?>
<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>


        <div id="content">
            <h3>User wijzigen </h3>
              <br><br>
			
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
                  Naam:<br><input name="name" type="text" value="<?php echo $User->getName(); ?>"/><br />
                  Wachtwoord:<br><input name="password" type="text" value="<?php echo $User->getPassword(); ?>"/><br />
				  E-mail:<br><input name="email" type="text" value="<?php echo $User->getEmail(); ?>"/><br />
				  Code:<br><input name="code" type="text" value="<?php echo $User->getCode(); ?>"/><br />
				  Active:<br><input name="active" type="text" value="<?php echo $User->getActive(); ?>"/><br />
                  <button class="submit" type="submit">User wijzigen</button>
            </form>
			
        </div>

		
		<?php include("menu.php");?>
    </body>
</html>