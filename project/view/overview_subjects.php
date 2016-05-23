<?php
session_start();
?>
<html>
	<head>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>

	<body>
		<?php include_once("../includes/navbar_bootstrap.php"); ?>
		<?php
		include_once("../classes/db/querymanager.php");  
		include_once("../classes/model/subjectClass.php"); 

		//change this when login function works
		$_SESSION['user_id'] = 1;
		
		$q = new Querymanager();
		$subjectList = $q->getSubjectsFromDocent($_SESSION['user_id']);
		?>
	
		<div class="container">
			<div class="page-header">
				<h3>Module toevoegen</h3>
			</div>
			<form class="form-horizontal" role="form" action="../controller/subjectcontroller.php" method="post">
				<div class="form-group">
					<div class="col-sm-6">
						<div class='form-group has-feedback'>
							<label class='col-sm-3 control-label'>Module naam:</label>
							<div class='col-sm-6'>
								<input class='form-control' id='focusedInput' type='text' name='subject_name' placeholder='Webdevelopment 1' required>
							</div>
						</div>
						<div class='form-group has-feedback'>
							<div class='col-sm-9'>
								<button class='btn btn-default glyphicon glyphicon-plus pull-right' type='submit' value='+'>Toevoegen</button>
							</div>
						</div>
						<input type='hidden' name='action' value='addSubject'>
						<input type='hidden' name='owner_id' value='<?php echo $_SESSION['user_id']; ?>'>				
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

