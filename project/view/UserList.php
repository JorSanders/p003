<?php
session_start();
?>
<html>

<head>
	<title>User List</title>
	<link type="text/css" rel="stylesheet" href="../includes/stylesheet.css">
	<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

	<body>
	<?php include_once("../includes/navbar_bootstrap.html"); ?>
	<?php
		
		?>
		 
                
                    <div class="container">
                    	<div class="page-header">
                        <h3>Gebruikers lijst </h3>
                    	</div>
                                <div class="col-sm-8">
             
		<?php

		// Role id ophalen uit database
		echo "<div id='table_List1'>";
		if (isset($_SESSION['user_roleList'])) {

			$user_roleList = unserialize ($_SESSION['user_roleList']);

			echo "<table class='table table-striped'> <tr><th>RoleId</th>
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
		


		// Users ophalen uit database
		echo "<div id='table_List2'>";
		$userList = unserialize ($_SESSION['userList']);

		echo "<table class='table table-striped'> <tr><th>Users</th>
			<tr><td>ID</td>";
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
		echo "<div id='table_List3'>";
		$role = unserialize ($_SESSION['roleList']);

		echo "<table class='table table-striped'> <tr><th>Role</th>
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
		echo "<div id='table_List4'>";
		$lesson = unserialize ($_SESSION['lesson']);

		echo "<table class='table table-striped'> <tr><th>Lesson</th>
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


	}

		// Subject
		echo "<div id='table_List5'>";
		$subject = unserialize ($_SESSION['subject']);

		echo "<table class='table table-striped'> <tr><th>Subject</th>
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
		echo "<div id='table_List6'>";
		$lesson = unserialize ($_SESSION['lesson']);

		echo "<table class='table table-striped'> <tr><th>user lesson</th>
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
	





	?>

	</table>
</div>
</div>
</div>

	<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
	<?php include_once("../includes/test_bootstrap.html"); ?> 

	</body>








</html>