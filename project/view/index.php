<?php include("../includes/sentry.php"); ?>
<html>

	<head>		
		<title>startpagina</title>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>
	
	<body>
	<?php include_once("../includes/navbar_bootstrap.php"); ?>    
		<div class="container">
			<div class="page-header">
				<h3> Startpagina / index <h3>
			</div>
			
			<li><a href="addUser.php">Gebruikers toevoegen</a></li>
			<li><a href="overview_subjects.php">Vakken toevoegen</a></li>
			<li><a href="overview_lessons_select.php">Lessen toevoegen</a></li>
			<li><a href="../controller/roleController.php?action=findAllRole">Gebruiker aan rol toevoegen</a></li>
			<li><a href="input_code.php">Aanwezig melden</a></li>
			<li><a href="addUserLesson.php">User aan les koppelen</a></li>
			<li><a href="AddRole.php">Rol toevoegen</a></li>
			<li><a href="changeRole.php">Rol veranderen</a></li>
			<li><a href="AllRolesList.php">Rollenoverzicht</a></li>
			<li><a href="AllSubjectsList.php">Module lijst</a></li>
			<li><a href="AllUsersList.php">Gebruikersoverzicht</a></li>
			<li><a href="CodeGeneratorSelect.php">Lescode genereren</a></li>
			<li><a href="deleteUser.php">Gebruiker verwijderen</a></li>
			<li><a href="changePassword.php">Wachtwoord veranderen</a></li>
			<li><a href="updateUser.php">Gebruiker wijzigen</a></li>
			<li><a href="addUserRole.php">Rol toevoegen aan gebruiker</a></li>

		</div> 
	
		<?php include_once("../includes/footer_bootstrap.html"); ?>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
		
	<body>
</html>