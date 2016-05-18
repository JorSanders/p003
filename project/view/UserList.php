<?php
session_start();
?>
<html>

<head>
	<title>Rol en gebruikers lijst</title>
	<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

<body>
	<div class="container">
		<div class="page-header">
			<h3> Rol en gebruikers lijst </h3>
		</div>
			

			<?php
			include_once("../includes/navbar_bootstrap.html");
	
		// Role id ophalen uit database
		echo "<div style='border: 1px solid black;'>";
			if (isset($_SESSION['user_roleList'])) {

				$user_roleList = unserialize ($_SESSION['user_roleList']);

			echo "<table> 
				<tr><th>RoleId</th></tr>
				<tr>
					<td>ID</td>";
					for($i = 0; $i < count($user_roleList); $i++){
						echo "<td>" . $user_roleList[$i][0] . "</td>";
						
					}			
				echo "</tr>";

				echo "<tr><td>UserId</td>";
					for($i = 0; $i < count($user_roleList); $i++){
						echo "<td>". $user_roleList[$i][1] . "</td>";
						
					}			
				echo "</tr>";

				echo "<tr>
					<td>RoleId</td>";
					for($i = 0; $i < count($user_roleList); $i++){
						echo "<td>" . $user_roleList[$i][2] . "</td>";
						
					}			
				echo "</tr>
			</table>";

			echo "</div>";		
		


		// Users ophalen uit database
		echo "<div style='border: 1px solid black;'>";
			$userList = unserialize ($_SESSION['userList']);

			echo "<table> 
				<tr><th>Users</th></tr>
				<tr>
					<td>ID</td>";
					for($i = 0; $i < count($userList); $i++){
						echo "<td>" . $userList[$i][0] . "</td>";

					}
				echo "</tr>";

				echo "<tr><td>Name</td>";
				for($i = 0; $i < count($userList); $i++){
					echo "<td>". $userList[$i][1] . "</td>";
				}
				echo "</tr></table>";
					
			echo "</div>";

		// Role
		echo "<div style='border: 1px solid black;'>";
		$role = unserialize ($_SESSION['roleList']);

		echo "<table> <tr><th>Role</th>
			<tr><td>ID</td>";
		for($i = 0; $i < count($role); $i++){
			echo "<td>" . $role[$i][0] . "</td>";

		}

		echo "</tr>";

			echo "<tr><td>Name</td>";
			for($i = 0; $i < count($role); $i++){
				echo "<td>". $role[$i][1] . "</td>";
			}
			echo "</tr></table>";
				
			echo "</div>";


		// Lesson
		echo "<div style='border: 1px solid black;'>";
		$lesson = unserialize ($_SESSION['lesson']);

		echo "<table> <tr><th>Lesson</th>
			<tr><td>LessonId</td>";
		for($i = 0; $i < count($lesson); $i++){
			echo "<td>" . $lesson[$i][0] . "</td>";

		}

		echo "</tr>";

			echo "<tr><td>Lesson naam</td>";
			for($i = 0; $i < count($lesson); $i++){
				echo "<td>". $lesson[$i][1] . "</td>";
			}
			echo "</tr></table>";
				
			echo "</div>";



		

		// Subject
		echo "<div style='border: 1px solid black;'>";
		$subject = unserialize ($_SESSION['subject']);

		echo "<table> <tr><th>Subject</th></tr>
			<tr><td>LessonId</td>";
		for($i = 0; $i < count($subject); $i++){
			echo "<td>" . $subject[$i][0] . "</td>";

		}

		echo "</tr>";

			echo "<tr><td>Lesson naam</td>";
			for($i = 0; $i < count($subject); $i++){
				echo "<td>". $subject[$i][1] . "</td>";
			}
			echo "</tr></table>";
				
			echo "</div>";

		// user_lesson
		echo "<div style='border: 1px solid black;'>";
		$lesson = unserialize ($_SESSION['lesson']);

		echo "<table > <tr><th>user lesson</th>
			<tr><td>LessonId</td>";
		for($i = 0; $i < count($lesson); $i++){
			echo "<td>" . $lesson[$i][0] . "</td>";

		}

		echo "</tr>";

			echo "<tr><td>Lesson naam</td>";
			for($i = 0; $i < count($lesson); $i++){
				echo "<td>". $lesson[$i][1] . "</td>";
			}
			echo "</tr></table>";
				
			echo "</div>";
	


	}else{
		header ("Location: ../controller/usercontroller.php?action=UserList");
	}


	?>
			
	</div>

	
	<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
	<?php include_once("../includes/test_bootstrap.html"); ?> 

	</body>








</html>