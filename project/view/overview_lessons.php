<?php include("../includes/sentry.php"); ?>
<html>
	<head>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>

	<body>
		<?php include_once("../includes/navbar_bootstrap.php"); ?>
		<?php
		$subject_id = $_GET['subject_id'];
		include_once("../classes/db/querymanager.php");  
		include_once("../classes/model/lessonClass.php"); 
		$q = new Querymanager();
		$lessonList = $q->getLessonsFromSubject($subject_id);
		?>
		<div class="container">
			<div class="page-header">
				<h3>Les toevoegen</h3>
			</div>
			<form class="form-horizontal" role="form" action="../controller/subjectcontroller.php" method="post">
				<div class="form-group">
					<div class="col-sm-6">
						<div class='form-group has-feedback'>
							<label class='col-sm-3 control-label'>Les naam:</label>
							<div class='col-sm-6'>
								<input class='form-control' id='focusedInput' type='text' name='lesson_name' placeholder='College 1' required>
							</div>
						</div>
						<div class='form-group has-feedback'>
							<div class='col-sm-9'>
								<button class='btn btn-default glyphicon glyphicon-plus pull-right' type='submit' value='+'>Toevoegen</button>
							</div>
						</div>
						<input type='hidden' name='action' value='addLesson'>
						<input type='hidden' name='subject_id' value='<?php echo $_GET['subject_id']; ?>'>
					</div>
				</div>		
			</form>

		</div>
		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 

	</body>
</html>

