<?php session_start(); ?>
<html>
	<head>
	<title>Inloggen</title>

	</head>

	<body>
		<h2>Inloggen</h2>
		<table >
			<form action="../controller/usercontroller.php" method="post">
				<input name="action" type="hidden" value="login"/>
				<tr><td> <p>Identificatiecode: </td>
					<td><input name="code" type="text" /> </td></tr>
				<tr><td><p>Wachtwoord: </td>
					<td><input name="password" type="password" /></td></tr>
				<tr><td></td><td><button class="submit" type="submit">Inloggen</button></td></tr>
			</form>
		</table>
	</body>
</html>