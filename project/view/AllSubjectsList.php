<?php include("../includes/sentry.php"); ?>
<html>
    <head>
        <?php  
		$_SESSION['userName']="Kevin";
		require_once("../includes/head_bootstrap.html"); 
		if (!isset($_SESSION['AllSubjectsList'])) {
			header('Location: ../controller/subjectcontroller.php?action=findAllSubjects');				
		}
		?> 
    </head>
	
    <body>
        <?php include_once("../includes/navbar_bootstrap.php"); ?>        
        <?php			
        require_once("../classes/model/subjectClass.php");      
        $AllSubjectsList = unserialize($_SESSION['AllSubjectsList']);
		unset($_SESSION["AllSubjectsList"]);
        ?>
        <div class="container">
            <div class="page-header">
                <h3>Modulesoverzicht</h3>
            </div>
            <div class="col-sm-8">                        
				<table class='table table-striped'> 
					<tr><th>Vak</th><th>Actief</th></tr>
					<?php
					foreach ($AllSubjectsList as $Subject) {
						echo "<tr><td><a href='../controller/subjectcontroller.php?action=findOneSubject&id=".$Subject->getId()."'>".$Subject->getName() . "</a></td>";
						echo "<td>".$Subject->getActive() . "</td></tr>";                    
					}    
				?>
				</table>
				<a class="btn btn-default" href="../view/CSV/SubjectCSV.php" role="button">CSV bestand exporteren</a>
			</div>
		</div>
		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?>  
    </body>
</html>