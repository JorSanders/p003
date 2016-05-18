<html>

<head>
	<title>Rol toevoegen</title>
	<?php include_once("../includes/head_bootstrap.html"); ?>
</head>

<body>
<?php include_once("../includes/navbar_bootstrap.html"); ?> 
    
    <div class="container">
		<div class="page-header">
			<h3>Rol toevoegen:</h3>
		</div>
		<form action="../controller/RoleController.php" method="POST">
			Rol:</br>
			<input name="action" type="hidden" value="insertRole">
			<input type="text" name="role" placeholder="Rol toevoegen">
			<input name="submit" type="submit" value="Rol toevoegen">
		</form>
	</div>
</body>
<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
	<?php include_once("../includes/test_bootstrap.html"); ?>
</footer>
</html>