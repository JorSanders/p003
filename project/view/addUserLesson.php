<?php 
session_start(); 

if ( 	isset($_SESSION['userIdNameList']) &&
		isset($_SESSION['lessonIdNameList'])
	){
		$userIdNameList 	= unserialize ($_SESSION['userIdNameList']); 
		$lessonIdNameList	= unserialize ($_SESSION['lessonIdNameList']); 


	echo "<form action='../controller/subjectcontroller.php' method='POST'>";
		
		//dropdown users
		echo"<select name='user_id'>";
		for ($i=0;$i<count($userIdNameList);$i++){
			echo "<option value='{$userIdNameList[$i][0]}'>". $userIdNameList[$i][1] ."</option>";
		}
		echo"</select>";
		
		//dropdown lessons
		echo"<select name='lesson_id'>";
		for ($i = 0; $i < count($lessonIdNameList); $i++){
			echo "<option value='{$lessonIdNameList[$i][0]}'>". $lessonIdNameList[$i][1] ."</option>";
		}
		echo"</select>";
		
		echo "<input type='hidden' name='action' value='add_user_lesson_manual'>";
		echo "<input type='submit'>";
	
	echo "</form>";
		
}else{
	header ("Location: ../controller/usercontroller.php?action=test");
}


include("menu.php");





?>