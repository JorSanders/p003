<html>

<head>
	<title>Update role</title>
</head>

	<body>
		<?php
			$id = 1;
		?>
		<form action="../controller/usercontroller.php" method="post">
			<input type="hidden" name="id" value=" <?php echo $id; ?> "/>
			<input type="hidden" name="action" value="updateRole"/>
			<input type="text" name="Role" placeholder="Rol wijzigen" required/>
			<input type="submit" name="submit" value="Verander rol">

		</form>

		<?php
		include("menu.php");
		?>

	</body>





</html>