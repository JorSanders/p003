<html>

<head>
	<title>wachtwoord aanpassen</title>
</head>

	<body>
		<?php
			$id = $_GET['id'];
		?>
		<form action="../controller/usercontroller.php" method="post">
			<input type="hidden" name="id" value=" <?php echo $id; ?> "/>
			<input type="password" name="old_password" placeholder="Oude wachtwoord"/>
			<input type="password" name="new_password1" placeholder="Nieuw wachtwoord"/>
			<input type="password" name="new_password2" placeholder="Herhaal nieuw wachtwoord"/>
			<button class="submit" type="submit" name="action" value="change_password">Wachtwoord wijzigen</button>

		</form>

		<?php
		include("menu.php");
		?>

	</body>





</html>