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
				unset($_SESSION["AllSubjectsList"]);
                ?>
                
                    <div class="container">
                        <div class="page-header">
                            <h3>Module lijst</h3>
                        </div>
                            <div class="col-sm-8">
                                
                <table class='table table-striped'> 
				<tr><th>Vak</th><th>Actief</th></tr>
                <?php
                foreach ($AllSubjectsList as $Subject) {
                    echo "<tr><td><a href='../controller/subjectcontroller.php?action=findOneSubject&id=".$Subject->getId()."'>".$Subject->getName() . "</a></td>";
					echo "<td>".$Subject->getActive() . "</td></tr>";
					
                    
                }    
            } else {
				header('Location: ../controller/subjectcontroller.php?action=findAllSubjects');				
            }
            ?>
        </table>
		<a class="btn btn-default" href="../view/CSV/SubjectCSV.php" role="button">CSV file</a>
      </div>
  </div>
</div>

    <footer>
    <?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
    <?php include_once("../includes/test_bootstrap.html"); ?>  
    </body>
</html>