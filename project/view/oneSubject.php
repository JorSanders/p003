<!DOCTYPE html><?php session_start(); ?>
<html>

<head>
	<title>Eén vak</title>
	 <?php include_once("../includes/head_bootstrap.html"); ?> 
</head>
	
	<body>
		<?php include_once("../includes/navbar_bootstrap.html"); ?> 
		<div class="container">
			<div class="page-header">
				<h3>Eén vak</h3>
			</div>
			
			<?php
			
			if (isset($_SESSION['subjectList'])){
				$subjectList= unserialize($_SESSION['subjectList']);
				foreach($subjectList as $subject){
			?>
					<table class='table table-striped'> 
						<tr><th>Vak</th><th>Actief</th></tr>
						<?php
						
						echo "<tr><td>". $subject["subject_name"] ."</td>";
						echo "<td>". $subject["active"] ."</td></tr>";
						?>
					</table><br>
				<?php						
				}
				
				//userlist
				if (isset($_SESSION['userList'])){
					$userList= unserialize($_SESSION['userList']);
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

				//lessonlist
				if (isset($_SESSION['lessonList'])){
					$lessonList= unserialize($_SESSION['lessonList']);
					echo "<table class='table table-striped'> ";
					echo "<tr><th>Lesnaam</th><th>Code</th><th>Actief</th></tr>";
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
				echo"rollijst niet gevonden";
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