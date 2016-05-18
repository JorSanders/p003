<html>
    <head>   
	<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>
	
<body>
	<?php include_once("../includes/navbar_bootstrap.html"); ?> 
		
	<div class= "container">
		<div class = "page-header">
			<?php
			session_start();
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
  </div>    
</body>
<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    <?php include_once("../includes/test_bootstrap.html"); ?> 
</footer>
</html>