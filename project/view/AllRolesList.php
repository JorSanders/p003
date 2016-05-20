<html>
    <head>
        <?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>
	
    <body>
        <?php include_once("../includes/navbar_bootstrap.html"); ?>
        
            <?php
            session_start();
			
            require_once("../classes/model/roleClass.php");

            if (isset($_SESSION['AllRolesList'])) { 
                
                $AllRolesList = unserialize($_SESSION['AllRolesList']);
                ?>
                
                    
                        <div class="container">
                            <div class="page-header">
                                <h3>Rol lijst </h3>
                            </div>
                                    <div class="col-sm-8">
              

                <table class='table table-striped'> 
				<tr><th>Rol</th><th>Actief</th></tr>
                <?php
				
                foreach ($AllRolesList as $Role) {
                    echo "<tr><td>".$Role->getName() . "</td>";
					echo "<td>".$Role->getActive() . "</td></tr>";
                
                }    
            } else {
				header('Location: ../controller/roleController.php?action=findAllRoles');				
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