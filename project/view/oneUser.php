<?php include("../includes/sentry.php"); ?>
<!DOCTYPE html>
<html>

	<head>
		<title>Eén gebruiker</title>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>
	
	<body>
		<?php include_once("../includes/navbar_bootstrap.php"); ?> 
		<div class="container">
			<div class="page-header">
				<h3>Eén gebruiker</h3>
			</div>			
			<?php			
			if (isset($_SESSION['userList'])){
				$userList= unserialize($_SESSION['userList']);
				unset($_SESSION['userList']);
				foreach($userList as $user){
			?>
					<table class='table table-striped'> 
						<tr><th>Naam</th><th>Email</th><th>Code</th><th>Actief</th></tr>
						<?php				
						echo "<tr><td>". $user["name"] ."</td>";
						echo "<td>". $user["email"] ."</td>";
						echo "<td>". $user["code"] ."</td>";
						echo "<td>". $user["active"] ."</td></tr>";
					echo "</table><br>";
				}
				
				// rol lijst
				if (isset($_SESSION['roleList'])){
					$roleList= unserialize($_SESSION['roleList']);
					unset($_SESSION['roleList']);
					echo "<table class='table table-striped'> ";
						echo "<tr><th>Rol</th><th>Actief</th></tr>";
						
						foreach($roleList as $role){						
							echo "<tr><td><a href='../controller/roleController.php?action=findOneRole&id=".$role["id"]."'>". $role["name"] ."</a></td>";
							echo "<td>". $role["active"] ."</td></tr>";												
						}
					echo "</table>";
				}else{
					echo"rollijst niet gevonden";
				}

				//vak lijst
				if (isset($_SESSION['subjectList'])){
					$subjectList= unserialize($_SESSION['subjectList']);
					unset($_SESSION['subjectList']);
					echo "<table class='table table-striped'> ";
						echo "<tr><th>Vaknaam</th><th>Actief</th></tr>";
						
						foreach($subjectList as $subject){						
							echo "<tr><td><a href='../controller/subjectcontroller.php?action=findOneSubject&id=".$subject["subject_id"]."'>". $subject["subject_name"] ."</a></td>";
							echo "<td>". $subject["active"] ."</td></tr>";												
						}
					echo "</table>";
				}else{
					echo"vaklijst niet gevonden";
				}
				
				//lessonlist
				if (isset($_SESSION['lessonList'])){
					$lessonList= unserialize($_SESSION['lessonList']);
					unset($_SESSION['lessonList']);
					echo "<table class='table table-striped'> ";
						echo "<tr><th>LesNaam</th><th>Code</th><th>Actief</th></tr>";
						foreach($lessonList as $lesson){

								
							echo "<tr><td><a href='../controller/subjectcontroller.php?action=findOneLesson&id=".$lesson['lesson_id']."'>". $lesson["lesson_name"] ."</a></td>";
							echo "<td>". $lesson["code"] ."</td>";
							echo "<td>". $lesson["active"] ."</td></tr>";
													
						}
					echo "</table>";
				}else{
					echo"leslijst niet gevonden";
				}
				
			}else{
				echo"gebruikerslijst niet gevonden";
			}
			
							?>
			

		</div>
		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
	</body>
</html>