<?php 
session_start();

include_once("../classes/db/querymanager.php");
include_once("../classes/model/subjectClass.php");

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
	isset($_POST['user_id'])){
	
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
		
		$q->addUser_Lesson($lesson_id, $_POST['user_id']);
		
		//$q->getLessonIdByCode2(12608);
		$lesson_name = $q->getLessonNameById($lesson_id);
		$_SESSION['lesson_name'] = $lesson_name;

		header("location: ../view/input_code.php");		
	}else{
		$_SESSION['code'] = $_POST['code'];
		header("location: ../view/input_code.php");	
	}
}
?>