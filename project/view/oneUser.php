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
			<?php			
			if (isset($_SESSION['userList'])){
				$userList = unserialize($_SESSION['userList']);
				unset($_SESSION['userList']);
				foreach($userList as $user){
			?>
					<div class="page-header">
						<h3>Gegevens van: <?php echo $user["name"]; ?></h3>
					</div>			

					<table class='table table-striped'> 
						<tr><th><?php echo $user["name"]; ?></th></tr>
						<tr><th>Naam</th><th>Email</th><th>Code</th><th>Actief</th></tr>
						<?php				
						echo "<tr><td>". $user["name"] ."</td>";
						echo "<td>". $user["email"] ."</td>";
						echo "<td>". $user["code"] ."</td>";
						if($user["active"] == 'true'){
								echo "<td>". "<label class='glyphicon glyphicon-ok'></label> "."</td>";
							}
							else{
								echo "<td>". "<label class='glyphicon glyphicon-remove'></label> "."</td>";
							}		
					echo "</table><br>";
				}
				
				// rol lijst
				if (isset($_SESSION['roleList'])){
					$roleList= unserialize($_SESSION['roleList']);
					unset($_SESSION['roleList']);
					echo "<table class='table table-striped'> ";
						echo "<tr><th>Rollen bij deze gebruiker:</th><tr>";
						echo "<tr><th>Rol</th><th>Actief</th></tr>";
						
						foreach($roleList as $role){						
							echo "<tr><td><a href='../controller/roleController.php?action=findOneRole&id=".$role["id"]."'>". $role["name"] ."</a></td>";
							if($role["active"] == 'true'){
								echo "<td>". "<label class='glyphicon glyphicon-ok'></label> "."</td>";
							}
							else{
								echo "<td>". "<label class='glyphicon glyphicon-remove'></label> "."</td>";
							}											
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
						echo "<tr><th>Vakken van deze gebruiker:</th></tr>";
						echo "<tr><th>Vaknaam</th><th>Actief</th></tr>";						
						foreach($subjectList as $subject){						
							echo "<tr><td><a href='../controller/subjectcontroller.php?action=findOneSubject&id=".$subject["subject_id"]."'>". $subject["subject_name"] ."</a></td>";
							if($subject["active"] == 'true'){
								echo "<td>". "<label class='glyphicon glyphicon-ok'></label> "."</td>";
							}
							else{
								echo "<td>". "<label class='glyphicon glyphicon-remove'></label> "."</td>";
							}													
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
						echo "<tr><th>Lessen die deze gebruiker heeft gevolgd:</th></tr>";
						echo "<tr><th>LesNaam</th><th>Code</th><th>Actief</th></tr>";
						foreach($lessonList as $lesson){								
							echo "<tr><td><a href='../controller/subjectcontroller.php?action=findOneLesson&id=".$lesson['lesson_id']."'>". $lesson["lesson_name"] ."</a></td>";
							echo "<td>". $lesson["code"] ."</td>";
							if($lesson["active"] == 'true'){
								echo "<td>". "<label class='glyphicon glyphicon-ok'></label> "."</td>";
							}
							else{
								echo "<td>". "<label class='glyphicon glyphicon-remove'></label> "."</td>";
							}														
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