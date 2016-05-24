<?php include("../includes/sentry.php"); ?>
<html>
    <head>
        <?php 
		$_SESSION['userName']="Kevin";
		require_once("../includes/head_bootstrap.html"); 
		if (!isset($_SESSION['AllUsersList'])) {
			header('Location: ../controller/usercontroller.php?action=findAllUsers');
		}		
		?> 
    </head>
	
    <body>	
        <?php require_once("../includes/navbar_bootstrap.php"); ?>
		<div class="container">
            <div class="page-header">
                <h3>Gebruikers lijst </h3>
            </div>
			<?php
			require_once("../classes/model/userclass.php");

            $AllUsersList = unserialize($_SESSION['AllUsersList']);
			unset($_SESSION["AllUsersList"]);
		
            echo '<div class="col-sm-8">';
			
				echo "<table class='table table-striped'> ";
					echo "<tr><th>Naam</th><th>E-mail</th><th>Identificatiecode</th><th>Actief</th><th>Aanpassen</th></tr>";
					foreach ($AllUsersList as $User) {
						echo "<tr><td><a href='../controller/usercontroller.php?action=findOneUser&id=".$User->getId()."'>".$User->getName()."</a></td>";
							echo "<td>".$User->getEmail() . "</td>";
							echo "<td>".$User->getCode() . "</td>";
							echo "<td>".$User->getActive() . "</td>";
							echo "<td><a href='../view/updateUser.php?id=".$User->getId()."'>aanpassen</a><td></tr>";
				
				}              
			?>
				</table>
				<a class="btn btn-default" href="../view/CSV/UserCSV.php" role="button">CSV file</a>
			
			</div>  
		</div>

		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 

    </body>
</html>