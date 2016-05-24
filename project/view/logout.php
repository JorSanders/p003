<?php include("../includes/sentry.php"); ?>
<html>
	<head>
	<title>Uitgelogd</title>

	</head>

	<body>

		<?php session_destroy(); ?>
		<h2>U bent uitgelogd, u kunt <a href="../view/login.php">hier</a> weer terug inloggen. </h2>

	</body>
</html>