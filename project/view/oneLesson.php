<?php include("../includes/sentry.php"); ?>
<!DOCTYPE html>
<html>

	<head>
		<title>Eén les</title>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>
	
	<body>
		<?php include_once("../includes/navbar_bootstrap.php"); ?> 
		<div class="container">		
			<?php			
			if (isset($_SESSION['lessonList'])){
				$lessonList= unserialize($_SESSION['lessonList']);
				unset($_SESSION['lessonList']);
				foreach($lessonList as $lesson){
			?>
					<div class="page-header">
						<h3>Gegevens van: <?php echo $lesson["lesson_name"]; ?></h3>
					</div>	
					
					<table class='table table-striped'> 
						<tr><th>Les</th><th>Code</th><th>Vaknaam</th><th>Actief</th></tr>
						<?php
						
						echo "<tr><td>". $lesson["lesson_name"] ."</td>";
						echo "<td>". $lesson["code"] ."</td>";
						echo "<td><a href='../controller/subjectcontroller.php?action=findOneSubject&id=".$lesson['subject_id']."'>". $lesson["subject_name"] ."</a></td>";
						echo "<td>". $lesson["active"] ."</td></tr>";
						?>
					</table><br>
				<?php						
				}
				
				//userlist
				if (isset($_SESSION['userList'])){
					$userList= unserialize($_SESSION['userList']);
					unset($_SESSION['userList']);
					echo "<table class='table table-striped'> ";
					echo "<tr><th>Naam</th><th>Email</th><th>Code</th><th>Actief</th></tr>";
					foreach($userList as $user){							
							echo "<tr><td><a href='../controller/usercontroller.php?action=findOneUser&id=".$user['id']."'>". $user["name"] ."</a></td>";
							echo "<td>". $user["email"] ."</td>";
							echo "<td>". $user["code"] ."</td>";
							echo "<td>". $user["active"] ."</td></tr>";												
					}
					echo "</table>";
				}else{
					echo"gebruikerslijst niet gevonden";
				}	
				
			}else{
				echo"leslijst niet gevonden";
			}
			
			?>
			

		</div>
		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
	</body>
</html>