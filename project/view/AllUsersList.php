<html>
    <head> 
	<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>
	
		<body>
			<?php include_once("../includes/navbar_bootstrap.html"); ?> 

			<div class = "container">
				<div class = "page-header">
					<h3> Lijst van alle gebruikers </h3>
				</div>
					<div class = "lead">
						<?php
						session_start();
						require_once("../classes/model/userclass.php");

						if (isset($_SESSION['AllUsersList'])) { 
							
							$AllUsersList = unserialize($_SESSION['AllUsersList']);
							
							foreach ($AllUsersList as $User) {
								echo $User->getId() . "<br>";
								echo $User->getName() . "<br>";
								echo $User->getPassword() . "<br>";
								echo $User->getEmail() . "<br>";
								echo $User->getCode() . "<br>";
								echo $User->getActive() . "<br>";
								echo "<br/><br/>";
							}              
						} else {
							header('Location: ../controller/usercontroller.php?action=findAllUsers');
						}
						?>
					</div>
			</div>    
		</body>
			<footer>
				<?php include_once("../includes/footer_bootstrap.html"); ?> 
				<?php include_once("../includes/test_bootstrap.html"); ?> 
			</footer>
</html>	