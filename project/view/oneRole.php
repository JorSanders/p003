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
			<?php			
			if (isset($_SESSION['roleList'])){
				$roleList= unserialize($_SESSION['roleList']);
				unset($_SESSION['roleList']);
				foreach($roleList as $role){
			?>
					<div class="page-header">
						<h3>Gegevens van: <?php echo $role["name"]; ?></h3>
					</div>
					
					<table class='table table-striped'> 
						<tr><th><?php echo $role["name"]; ?></th></tr>
						<tr><th>Rol</th><th>Actief</th></tr>
						<?php						
						echo "<tr><td>". $role["name"] ."</td>";
						if($role["active"] == 'true'){
								echo "<td>". "<label class='glyphicon glyphicon-ok'></label> "."</td>";
							}
							else{
								echo "<td>". "<label class='glyphicon glyphicon-remove'></label> "."</td>";
							}
						
						?>
					</table><br>
				<?php						
				}
				
				if (isset($_SESSION['userList'])){
					$userList= unserialize($_SESSION['userList']);
					unset($_SESSION['userList']);
					echo "<table class='table table-striped'> ";
						echo "<tr><th>Gebruikers met deze rol:</th></tr>";
						echo "<tr><th>Naam</th><th>Email</th><th>Code</th><th>Actief</th></tr>";
						foreach($userList as $user){								
								echo "<tr><td><a href='../controller/usercontroller.php?action=findOneUser&id=".$user['id']."'>". $user["name"] ."</a></td>";
								echo "<td>". $user["email"] ."</td>";
								echo "<td>". $user["code"] ."</td>";
								if($user["active"] == 'true'){
								echo "<td>". "<label class='glyphicon glyphicon-ok'></label> "."</td>";
							}
							else{
								echo "<td>". "<label class='glyphicon glyphicon-remove'></label> "."</td>";
							}
																					
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