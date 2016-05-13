<html>

<head>
	<title>Rol toevoegen</title>
</head>

	<body>
		<table>
			<tr><th><h3>Rol toevoegen:</h3></th></tr>
		<form action="../controller/roleController.php" method="POST">
			<tr><td>Rol:</td></tr>
			<tr><td><input name="action" type="hidden" value="insertRole"></td></tr>
			<tr><td><input type="text" name="role" placeholder="Rol toevoegen"/></td></tr>
			<tr><td><input name="submit" type="submit" value="Rol toevoegen"></td></tr>
		</form>
	</table>


	</body>








</html>