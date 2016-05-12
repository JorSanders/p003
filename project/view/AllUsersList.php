<html>
    <head></head>
	
    <body>
        <div id="content">
            <?php
			include("menu.php");
            session_start();
            require_once("../classes/model/userclass.php");

            if (isset($_SESSION['AllUsersList'])) { 
                
                $AllUsersList = unserialize($_SESSION['AllUsersList']);
				
                foreach ($AllUsersList as $User) {
                    echo $User->getId() . "<br>";
                    echo $User->getName() . "<br>";
					echo $User->getPassword() . "<br>";
					echo $User->getEmail() . "<br>";
					echo $User->getCode() . "<br>";
					echo $User->getActive() . "<br>";
                    echo "<br/><br/>";
                }              
            } else {
				header('Location: ../controller/usercontroller.php?action=findAllUsers');
			}
            ?>
      </div>    
    </body>
</html>