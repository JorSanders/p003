<?php
session_start();
?>
<!doctype html>
<html>

	<head>
	<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>

	<body>
		<div class="container">
			<div class="page-header">
				<h3>Les en code</h3>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<?php include_once("../includes/navbar_bootstrap.php"); ?> 
					<?php
					$subject_id = $_GET['subject_id'];	

					include_once("../classes/db/querymanager.php");  
					include_once("../classes/model/lessonClass.php"); 

					$q = new Querymanager();


					$lessonList = $q->getLessonsFromSubject($subject_id);

					//shows all lesson names as links 
					if (isset($lessonList)){
						foreach ($lessonList as $lesson) {
							echo /*"<a href='overview_lessons.php?vakcode={$lesson->get_id()}'> ".*/$lesson->getName() ."</a> ";
							if ($lesson->getCode() == 0){
								echo "<form style='display:inline-block;' action='../controller/subjectcontroller.php' method='POST'>
								<input class='btn btn-default' type='submit' value='Genereer lescode'>
								<input type='hidden' name='lesson_id' value='{$lesson->getId()}'> 
								<input type='hidden' name='subject_id' value='$subject_id'> 
								<input type='hidden' name='action' value='generate_code'>
								</form>";		
							}else if($lesson->getCode() == 1){
								echo "Deze les is al gesloten.";
							}else{
								echo $lesson->getCode();
							}	
							
						   echo "<br>";
						}
					} else {
						echo "U heeft voor dit vak nog geen lessen aangemaakt.";
					}
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
