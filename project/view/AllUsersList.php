<html>
    <head>
        <?php   session_start();
		//session_destroy();
		$_SESSION['userName']="Kevin";
		require_once("../includes/head_bootstrap.html"); ?> 
    </head>
	
    <body>
	
        <?php require_once("../includes/navbar_bootstrap.php"); ?>
		<div class="container">
            <div class="page-header">
                <h3>Gebruikers lijst </h3>
            </div>
        <?php
		
		
      
        require_once("../classes/model/userclass.php");

        if (isset($_SESSION['AllUsersList'])) { 
            $AllUsersList = unserialize($_SESSION['AllUsersList']);
			unset($_SESSION["AllUsersList"]);
		?>


                <div class="col-sm-8">
             

					<table class='table table-striped'> 
						<tr><th>Naam</th><th>E-mail</th><th>Identificatiecode</th><th>Actief</th><th>Aanpassen</th></tr>
					<?php
						foreach ($AllUsersList as $User) {
							echo "<tr><td><a href='../controller/usercontroller.php?action=findOneUser&id=".$User->getId()."'>".$User->getName()."</a></td>";
							echo "<td>".$User->getEmail() . "</td>";
							echo "<td>".$User->getCode() . "</td>";
							echo "<td>".$User->getActive() . "</td>";
							echo "<td><a href='../view/updateUser.php?id=".$User->getId()."'>aanpassen</a><td></tr>";
						}              
        } else {
			header('Location: ../controller/usercontroller.php?action=findAllUsers');
			echo '<a href="../controller/usercontroller.php?action=findAllUsers">test</a>';
					echo '<a class="btn btn-default" href="../view/CSV/UserCSV.php" role="button">CSV file</a>';
		}
					?>
					</table>

			
				</div>  
			</div>

    <footer>
		<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 

    </body>
</html>