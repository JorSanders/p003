<?php session_start(); ?>
<html>
<head>
<title>Uitgelogd</title>

</head>

		<body>
		<div id="header">



		</div>
		<div id="menu">

		</div>
		<?php session_destroy(); ?>
				<div id="content">
				<h2>U bent uitgelogd, u kunt hier weer :</h2>
				<table >
				<form action="../controller/usercontroller.php" method="post">
				  <input name="action" type="hidden" value="login"/>
				 <tr><td> <p>Voornaam: </td>
				  <td><input name="name" type="text" /> </td></tr>
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