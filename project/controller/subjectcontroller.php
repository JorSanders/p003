<?php 
session_start();

include_once("../classes/db/querymanager.php");
include_once("../classes/model/subjectClass.php");

$q = new Querymanager();

if ($_POST['action']=="addSubject" &&
	isset($_POST['subject_name']) &&
	isset($_POST['owner_id'])){
	
	$q->addSubject($_POST['subject_name'], $_POST['owner_id']);
	header("location: ../view/overview_subjects.php");
}
	
if ($_POST['action']=="addLesson" &&
	isset($_POST['lesson_name']) &&
	isset($_POST['subject_id'])){
	
	$q->addLesson($_POST['lesson_name'], $_POST['subject_id']);
	header("location: ../view/overview_lessons.php?subject_id={$_POST['subject_id']}");
}	

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

?>