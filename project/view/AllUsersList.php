<html>
    <head>
        <?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>
	
    <body>
        <?php include_once("../includes/navbar_bootstrap.html"); ?>
        
            <?php
			
            session_start();
            require_once("../classes/model/userclass.php");

            if (isset($_SESSION['AllUsersList'])) { 
                
                $AllUsersList = unserialize($_SESSION['AllUsersList']);
				?>

             
                
                    <div class="container">
                        <div class="page-header">
                            <h3>Gebruikers lijst </h3>
                        </div>
                                <div class="col-sm-8">
             

                <table class='table table-striped'> 
				<tr><th>Naam</th><th>E-mail</th><th>Identificatiecode</th><th>Actief</th></tr>
                <?php
                foreach ($AllUsersList as $User) {
                    echo "<tr><td>".$User->getName() . "</td>";
					echo "<td>".$User->getEmail() . "</td>";
					echo "<td>".$User->getCode() . "</td>";
					echo "<td>".$User->getActive() . "</td></tr>";
                    
                }              
            } else {
				header('Location: ../controller/usercontroller.php?action=findAllUsers');
			}
            ?>
        </table>
      </div>  
    </div>
</div>  

    <footer>
    <?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
    <?php include_once("../includes/test_bootstrap.html"); ?> 

    </body>
</html>