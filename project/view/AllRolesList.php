<html>
	<head>
	   <?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>
	
<body>
	<?php include_once("../includes/navbar_bootstrap.html"); ?> 

	<div class= "container">
		<div class= "page-header">
		<h3> Een lijst met alle rollen.</h3>
		</div>
			<?php
			session_start();

			require_once("../classes/model/roleClass.php");

			if (isset($_SESSION['AllRolesList'])) { 

			$AllRolesList = unserialize($_SESSION['AllRolesList']);

			foreach ($AllRolesList as $Role) {
			echo $Role->getId() . "<br>";
			echo $Role->getName() . "<br>";
			echo $Role->getActive() . "<br>";
			echo "<br/><br/>";
			}    
			} else {
			header('Location: ../controller/roleController.php?action=findAllRoles');				
			}
			?>
		
	</div>
<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    <?php include_once("../includes/test_bootstrap.html"); ?> 
</footer>    
</body>
</html>