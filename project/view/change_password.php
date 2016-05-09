<html>

<head>
	<title>wachtwoord aanpassen</title>
</head>

	<body>
		<?php

			$studentnummer = 1;
		?>
		<form action="../controller/usercontroller.php" method="post">
			<input type="hidden" name="id" value=" <?php echo $studentnummer; ?> "/>
			<input type="hidden" name="action" value="change_password"/>
			<input type="password" name="old_password" placeholder="Oude wachtwoord"/>
			<input type="password" name="new_password1" placeholder="Nieuw wachtwoord"/>
			<input type="password" name="new_password2" placeholder="Herhaal nieuw wachtwoord"/>
			<input name="submit" type="submit" value="Wachtwoord wijzigen">

		</form>


	</body>








</html>