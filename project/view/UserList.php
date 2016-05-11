<?php
session_start();
?>
<html>

<head>
	<title>User List</title>
	<link type="text/css" rel="stylesheet" href="../includes/stylesheet.css">
</head>

	<body>
	
	<?php
		include("menu.php");

		echo "<div id='table_userList'>";
		if (isset($_SESSION['user_roleList'])) {

			$user_roleList = unserialize ($_SESSION['user_roleList']);

			echo "<table 
			<tr><td>ID</td>";
			for($i = 0; $i < count($user_roleList); $i++){
				echo "<td>" . $user_roleList[$i][0] . "</td>";
				
			}
		
			echo "</tr>";

			echo "<tr><td>UserId</td>";
			for($i = 0; $i < count($user_roleList); $i++){
				echo "<td>". $user_roleList[$i][1] . "</td>";
				
			}
		
			echo "</tr>";

			echo "<tr><td>RoleId</td>";
			for($i = 0; $i < count($user_roleList); $i++){
				echo "<td>" . $user_roleList[$i][2] . "</td>";
				
			}
		
			echo "</tr></table>";

			echo "</div>";		
		}

	?>

	


	</body>








</html>