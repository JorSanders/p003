<html>
    <head></head>
	
    <body>
        <div id="content">
            <?php
			include("menu.php");
            session_start();
            require_once("../classes/model/userclass.php");

			//kijk of de userlijst is aangemaakt
            if (isset($_SESSION['AllUsersList'])) { 
                
				//haal de userlijst op
                $AllUsersList = unserialize($_SESSION['AllUsersList']);
				
				//ga de userlijst door en echo alle gegevens van die user
                foreach ($AllUsersList as $User) {
                    echo $User->getId() . "<br>";
                    echo $User->getName() . "<br>";
					echo $User->getPassword() . "<br>";
					echo $User->getEmail() . "<br>";
					echo $User->getCode() . "<br>";
					echo $User->getActive() . "<br>";
					echo " <a href='../view/updateUser.php?id=".$User->getId()."'>Wijzigen</a>";
                    echo "<br/><br/>";
                }  
				//unset de userlijst uit de session zodat als de page refreshed de gegevens opnieuw worden opgehaald
				unset($_SESSION['AllUsersList']);				
            } else {
				//als de userlijst nog niet is gezet haal de lijst op dmv de controller
				header('Location: ../controller/usercontroller.php?action=findAllUsers');
			}
            ?>
      </div>    
    </body>
</html>