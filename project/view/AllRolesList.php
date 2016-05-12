<html>
    <head></head>
	
    <body>
        <div id="content">
            <?php
            session_start();
			include("menu.php");
            require_once("../classes/model/roleClass.php");

            if (isset($_SESSION['AllRolesList'])) { 
                
                $AllRolesList = unserialize($_SESSION['AllRolesList']);
				
                foreach ($AllRolesList as $Role) {
                    echo $Role->getId() . "<br>";
                    echo $Role->getName() . "<br>";
					echo $Role->getActive() . "<br>";
                    echo "<br/><br/>";
                }    
            } else {
				header('Location: ../controller/roleController.php?action=findAllRoles');				
            }
            ?>
      </div>    
    </body>
</html>