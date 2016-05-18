<html>

	<head>
		
		<title>startpagina</title>
		<?php include_once("../includes/head_bootstrap.html"); ?> 

	</head>
	
	<body>
	<?php include_once("../includes/navbar_bootstrap.html"); ?> 
    
		<div class="container">
		  <div class="page-header">
			<h3> Startpagina / index <h3>
		  </div>
			<li><a href="overview_subjects.php">Vakken en lessen toevoegen (overview_subjects.php)*</a></li>
			<li><a href="addUser.php">Gebruikers toevoegen (addUser.php)*</a></li>
			<li><a href="../controller/roleController.php?action=findAllRole">Gebruiker aan rol toevoegen (/controller/roleController.php)*</a></li>
			<li><a href="input_code.php">Aanwezig melden (input_code.php)*</a></li>
			<li><a href="../controller/usercontroller.php?action=UserList">Rol lijst en Rol id (/controller/usercontroller.php)*</a></li>
			<li><a href="addUserLesson.php">user aan les koppelen (addUserLesson.php)*</a></li>
			<li><a href="AddRole.php">rol toevoegen (AddRole.php)</a></li>
			<li><a href="AllRolesList.php">rol lijst (AllRolesList.php)</a></li>
			<li><a href="AllSubjectsList.php">les lijst (AllSubjectsList.php)</a></li>
			<li><a href="AllUsersList.php">user lijst (AllUsersList.php)</a></li>
			<li><a href="UserList.php">rol en gebruiker lijst (is hetzelfde als "Rol lijst en Rol id")</a></li> 
		</div> 
		
			 <?php include_once("../includes/footer_bootstrap.html"); ?>
			<?php include_once("../includes/test_bootstrap.html"); ?> 
		
	<body>
</html>