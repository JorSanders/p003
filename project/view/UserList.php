<?php
session_start();
?>
<html>

<head>
	<title>User List</title>
</head>

	<body>
	
	<?php
		include("menu.php");
		
		if (isset($_SESSION['user_roleList'])) {

			$user_roleList = unserialize ($_SESSION['user_roleList']);

			echo "<select name='userId'>";
			for($i = 0; $i < count($user_roleList); $i++){
				echo "<option>" . "user id = ". $user_roleList[$i][0] . "</option>";
				
			}
		
			echo "</select>";

				echo "<select name='userId'>";
			for($i = 0; $i < count($user_roleList); $i++){
				echo "<option>" . "role id = ". $user_roleList[$i][1] . "</option>";
				
			}
		
			echo "</select>";
			
		}

	?>


	</body>








</html>