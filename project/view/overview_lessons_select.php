<?php include("../includes/sentry.php"); ?>
<html>

	<head>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>

	<body>
		<?php include_once("../includes/navbar_bootstrap.php"); ?> 
		<div class="container">
			<div class="page-header">
				<h3>Les toevoegen</h3>
			</div>
			<div class="form-group">
				<div class="col-sm-10">
					Selecteer een module waarvoor u een les wil toevoegen.
					<br></br>
					<?php
					include_once("../classes/db/querymanager.php");  
					include_once("../classes/model/subjectClass.php"); 

					$q = new Querymanager();


					$subjectList = $q->getSubjectsFromDocent($_SESSION['id']);

					//shows all subject names as links to show all the lessons from that subject
					if (isset($subjectList)){
						foreach ($subjectList as $subject) {
							echo "<a href='overview_lessons.php?subject_id={$subject->getId()}'> ".$subject->getName() ."</a><br>";
						}  
						echo "<br><br><br>";						
					} else {
						echo "U heeft nog geen vakken aangemaakt waarvoor lessen toegevoegd kunnen worden.";
					}
					echo "Klik <a href='overview_subjects.php'> hier </a>om modules toe te voegen <br>";
					?>
				</div>
			</div>
		</div>
		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 

	</body>

</html>