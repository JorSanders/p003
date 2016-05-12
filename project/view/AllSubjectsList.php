<html>
    <head></head>
	
    <body>
        <div id="content">
            <?php
            session_start();
			include("menu.php");
            require_once("../classes/model/subjectClass.php");

            if (isset($_SESSION['AllSubjectsList'])) { 
                
                $AllSubjectsList = unserialize($_SESSION['AllSubjectsList']);

                foreach ($AllSubjectsList as $Subject) {
                    echo $Subject->getId() . "<br>";
                    echo $Subject->getName() . "<br>";
					echo $Subject->getOwner_id() . "<br>";
					echo $Subject->getActive() . "<br>";
                    echo "<br/><br/>";
                }    
            } else {
				header('Location: ../controller/subjectcontroller.php?action=findAllSubjects');				
            }
            ?>
      </div>    
    </body>
</html>