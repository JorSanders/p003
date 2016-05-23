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
				<h2>U bent uitgelogd, u kunt <a href="../view/login.php">hier</a> weer terug inloggen. </h2>

				</div>
		</body>
</html>