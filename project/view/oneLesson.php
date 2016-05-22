<!DOCTYPE html><?php session_start(); ?>
<html>

<head>
	<title>Eén les</title>
	 <?php include_once("../includes/head_bootstrap.html"); ?> 
</head>
	
	<body>
		<?php include_once("../includes/navbar_bootstrap.html"); ?> 
		<div class="container">
			<div class="page-header">
				<h3>Eén les</h3>
			</div>
			
			<?php
			
			if (isset($_SESSION['lessonList'])){
				$lessonList= unserialize($_SESSION['lessonList']);
				foreach($lessonList as $lesson){
			?>
					<table class='table table-striped'> 
						<tr><th>Les</th><th>Code</th><th>Vaknaam</th><th>Actief</th></tr>
						<?php
						
						echo "<tr><td>". $lesson["lesson_name"] ."</td>";
						echo "<td>". $lesson["code"] ."</td>";
						echo "<td>". $lesson["subject_name"] ."</td>";
						echo "<td>". $lesson["active"] ."</td></tr>";
						?>
					</table><br>
				<?php						
				}
				
				//vak lijst
				if (isset($_SESSION['subjectList'])){
					$subjectList= unserialize($_SESSION['subjectList']);
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
				
			}else{
				echo"leslijst niet gevonden";
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