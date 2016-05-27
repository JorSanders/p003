<?php include("../includes/sentry.php"); ?>
<html>

	<head>
	<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>

	<body>
		<div class="container">
			<div class="page-header">
				<h3>Lescode genereren</h3>
			</div>
			<?php include_once("../includes/navbar_bootstrap.php"); ?> 

			<?php

			include_once("../classes/db/querymanager.php");  
			include_once("../classes/model/subjectClass.php"); 

			
			$q = new Querymanager();
			$subjectList = $q->getSubjectsFromDocent($_SESSION['id']);

			//shows all subject names as links to show all the lessons from that subject
			if (isset($subjectList)){
				echo "Kies een module waar u een lescode voor wilt genereren. <br><br>";
				foreach ($subjectList as $subject) {
					echo "<a href='CodeGeneratorCreate.php?subject_id={$subject->getId()}'> ".$subject->getName() ."</a><br>";
				}   
				echo "<br><br><br>";
			} else {
				echo "U heeft nog geen modules aangemaakt.<br>";
			}
			echo "Klik <a href='overview_subjects.php'> hier </a>om modules toe te voegen <br>";

			?>
		</div>
		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
	</body>

</html>
