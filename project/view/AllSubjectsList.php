<html>
    <head>
        <?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>
	
    <body>
        <?php include_once("../includes/navbar_bootstrap.html"); ?>
        
            <?php
            session_start();
			
            require_once("../classes/model/subjectClass.php");

            if (isset($_SESSION['AllSubjectsList'])) { 
                
                $AllSubjectsList = unserialize($_SESSION['AllSubjectsList']);
                ?>
                
                    <div class="container">
                        <div class="page-header">
                            <h3>Rol lijst </h3>
                        </div>
                            <div class="col-sm-8">
                                
                                <table class='table table-striped'> 
                <?php
                foreach ($AllSubjectsList as $Subject) {
                    echo "<tr><td>".$Subject->getId() . "</td>";
                    echo "<td>".$Subject->getName() . "</td>";
					echo "<td>".$Subject->getOwner_id() . "</td>";
					echo "<td>".$Subject->getActive() . "</td></tr>";
					
                    
                }    
            } else {
				header('Location: ../controller/subjectcontroller.php?action=findAllSubjects');				
            }
            ?>
        </table>
      </div>
	  
	<a class="btn btn-default" href="../view/SubjectCSV.php" role="button">CSV file</a>
  </div>
</div>

    <footer>
    <?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
    <?php include_once("../includes/test_bootstrap.html"); ?>  
    </body>
</html>