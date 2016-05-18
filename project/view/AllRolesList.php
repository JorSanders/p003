<html>
    <head>
        <?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>
	
    <body>
        <?php include_once("../includes/navbar_bootstrap.html"); ?>
        
            <?php
            session_start();
			include("menu.php");
            require_once("../classes/model/roleClass.php");

            if (isset($_SESSION['AllRolesList'])) { 
                
                $AllRolesList = unserialize($_SESSION['AllRolesList']);
                ?>
                
                    <div id="content">
                        <div class="container">
                            <br></br>
                            <h2>Rol lijst </h2>
                                    <div class="col-sm-8">
              <br><br>

                <table class='table table-striped'> 
                <?php
				
                foreach ($AllRolesList as $Role) {
                    echo "<tr><td>".$Role->getId() . "</td>";
                    echo "<td>".$Role->getName() . "</td>";
					echo "<td>".$Role->getActive() . "</td>";
                
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