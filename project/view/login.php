<?php session_start(); ?>
<html>
<head>
<title>Login</title>

</head>

		<body>
		<div id="header">



		</div>
		<div id="menu">

		</div>
				<div id="content">
				<h2>Login:</h2>
				<table >
				<form action="../controller/usercontroller.php" method="post">
				  <input name="action" type="hidden" value="login"/>
				 <tr><td> <p>Leerlingnummer of Docentcode: </td>
				  <td><input name="code" type="text" /> </td></tr>
				  </p>
				  <tr><td><p>Wachtwoord: </td>
				   <td><input name="password" type="password" /></td></tr>
				  </p>
				 
				  <p>
				  <tr><td></td><td><button class="submit" type="submit">Inloggen</button></td></tr>
				  </p>
				  </table>
				</form>
				</div>
		</body>
</html>