<?php include("../includes/sentry.php"); ?>
<!DOCTYPE html>
<html>

	<head>
		<title>Eén rol</title>
		 <?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>
	
	<body>
		<?php include_once("../includes/navbar_bootstrap.php"); ?> 
		<div class="container">
			<div class="page-header">
				<h3>Eén rol</h3>
			</div>
			
			<?php			
			if (isset($_SESSION['roleList'])){
				$roleList= unserialize($_SESSION['roleList']);
				unset($_SESSION['roleList']);
				foreach($roleList as $role){
			?>
					<table class='table table-striped'> 
						<tr><th>Rol</th><th>Actief</th></tr>
						<?php						
						echo "<tr><td>". $role["name"] ."</td>";
						echo "<td>". $role["active"] ."</td></tr>";
						?>
					</table><br>
				<?php						
				}
				
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
				echo"rollijst niet gevonden";
			}
			
			?>
		</div>
		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
	</body>
</html>