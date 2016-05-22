<?php 
session_start();

include_once("../classes/db/querymanager.php");
include_once("../classes/model/subjectClass.php");
include_once("../classes/model/userclass.php");

$q = new Querymanager();

	//add a subject in the database
if ($_POST['action']=="addSubject" &&
	isset($_POST['subject_name']) &&
	isset($_POST['owner_id'])){
	
	$q->addSubject($_POST['subject_name'], $_POST['owner_id']);
	header("location: ../view/overview_subjects.php");
}
	
	//add a lesson in the database
if ($_POST['action']=="addLesson" &&
	isset($_POST['lesson_name']) &&
	isset($_POST['subject_id'])){
	
	$q->addLesson($_POST['lesson_name'], $_POST['subject_id']);
	header("location: ../view/overview_lessons.php?subject_id={$_POST['subject_id']}");
}	

	//generate a random code for lessons.
if ($_POST['action']=="generate_code" && 
	isset($_POST['lesson_id']) &&
	isset($_POST['subject_id'])){

	// Checks if the code doesnt exist yet
	$codeList = $q->getAllCodes();
	do{
		$duplicate = false;
		$code = rand(10000, 99999);

		foreach($codeList as $existingCode){
			if($code == $existingCode){
				$duplicate = true;
			}
		}
	}
	while($duplicate);
	$q->updateLessonCode($_POST['lesson_id'], $code);
	header("location: ../view/overview_lessons.php?subject_id={$_POST['subject_id']}");			
	
}
	// add a user to a lesson
if ($_POST['action']=="add_user_lesson" && 
	isset($_POST['code']) &&
	isset($_POST['search']) &&
	isset($_POST['name'])){
		
	$search = $_POST['search'];
	$name = $_POST['name'];
	
	//checks if code is valid
	$codeList = $q->getAllCodes();
	
	$validCode = false;
	foreach($codeList as $existingCode){
		if($_POST['code'] == $existingCode){
			$validCode = true;
		}
	}
	
	$_SESSION['validCode'] = $validCode;
	//if code is valid write to database. afterwards send the user back to the view
	if($validCode){
		$lesson_id = $q->getLessonIdByCode($_POST['code']);
		$userList = $q->getUserIdByWhatever($search, $name);
		foreach($userList as $user) {
			$user_id = $user->getId();
		}
		
		echo "$user_id";
		$q->addUser_Lesson($lesson_id, $user_id);
		
		//$q->getLessonIdByCode2(12608);
		$lesson_name = $q->getLessonNameById($lesson_id);
		$_SESSION['lesson_name'] = $lesson_name;

		//header("location: ../view/input_code.php");		
	}else{
		$_SESSION['code'] = $_POST['code'];
		header("location: ../view/input_code.php");	
	}
}

	// add a user to a lesson
if ($_POST['action']=="add_user_lesson_manual" && 
	isset($_POST['user_id']) &&
	isset($_POST['lesson_id'])){
	
	$q->addUser_Lesson($_POST['lesson_id'], $_POST['user_id']);
	header("location: ../view/addUserLesson.php");		
}

	//AllSubjectsList
	if ($_GET['action']=='findAllSubjects') {
		$AllSubjectsList = $q->findAllSubjects();
		$_SESSION['AllSubjectsList'] = serialize($AllSubjectsList);
		header('Location: ../view/AllSubjectsList.php');
	}
	
	//find combinations in the database
	if ($_POST["action"] == "find_combinations"){
		
		if($_POST["tableOrigin"] == "user"){
			$idName = "id";
		}else if($_POST["tableOrigin"] == "role"){
			$idName = "id";
		}else if($_POST["tableOrigin"] == "lesson"){
			$idName = "lesson_id";
		}

		// get id from the origin table
		$idList = $q->getListAbyBfromTable(
			$idName,					//column a name
			$_POST["value"],			//variable b
			$_POST["column"],		//column b
			$_POST["tableOrigin"]	//table
		);
		
		//check how many results
		if(count($idList) == 0){
			//empty
			echo"empty<br>";
		}else if(count($idList) == 1){
			//er bestaat er 1
			echo "id = ". $idList[0] ."<br>";
		}else{
			//return meerdere results
			foreach ($idList as $id){
				echo "id = $id <br>";
			}
		}
		
		
		//find inbetween table name
		if ($_POST["tableOrigin"] == $_POST["tableGoal"]){
			//same table
			$inbetween_table = $_POST["tableOrigin"];
			$idOrigin = $idList[0];
			$idGoal = $idList[0];
		}else if(
			$_POST["tableOrigin"] == "user" && $_POST["tableGoal"]== "role" 
			){
			//user into role
			$inbetween_table = "user_role";
			$idOrigin = "user_id";
			$idGoal = "role_id";
		}else if(
			$_POST["tableOrigin"] == "user" && $_POST["tableGoal"]== "lesson" 
			){
			//user into lesson	
			$inbetween_table = "user_lesson";
			$idOrigin = "user_id";
			$idGoal = "lesson_id";	
		}else if(
			$_POST["tableOrigin"] == "lesson" && $_POST["tableGoal"]== "user" 
			){
			//lesson into user	
			$inbetween_table = "user_lesson";
			$idOrigin = "lesson_id";
			$idGoal = "user_id";
		}else if(
			$_POST["tableOrigin"] == "role" && $_POST["tableGoal"]== "user" 
			){
			//role into user
			$inbetween_table = "user_role";
			$idOrigin = "role_id";
			$idGoal = "user_id";
		}
			
					
		//get ids from the goal table
		$idList = $q->getListAbyBfromTable(
			$idGoal,					//column a name
			$idList[0],					//variable b
			$idOrigin,					//column b
			$inbetween_table 			//table
		);
		
		if($_POST["tableGoal"] == "user"){
			$idName = "id";
		}else if($_POST["tableGoal"] == "role"){
			$idName = "id";
		}else if($_POST["tableGoal"] == "lesson"){
			$idName = "lesson_id";
		}
		
		foreach($idList as $id){
		$result[] = $q->getAllWithValue($id, $idName, $_POST["tableGoal"]);
		}

		
		$_SESSION['result'] = serialize($result);
		header("Location: ../view/overview_combination.php?tableGoal={$_POST["tableGoal"]}&tableOrigin={$_POST["tableOrigin"]}&column={$_POST["column"]}&value={$_POST["value"]}");
	}


	
	
	
	
?>