<?php
session_start();
?>
<html>

<head>
	<title>User List</title>
</head>

	<body>
	
	<?php
		if (isset($_SESSION['user_roleList'])) {

			$user_roleList = unserialize ($_SESSION['user_roleList']);

			for($i = 0; $i < count($user_roleList); $i++){
				echo "user id = ". $user_roleList[$i][0];
				echo "role id = ". $user_roleList[$i][1];
				echo "<br>";
			}
		}
	?>

	</body>








</html>