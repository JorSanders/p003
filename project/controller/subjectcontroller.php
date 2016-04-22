<?php 
session_start();

include_once("../classes/db/querymanager.php");
include_once("../classes/model/subjectClass.php");

$q = new Querymanager();

if ($_POST['action']=="addSubject" &&
	isset($_POST['subjectName']) &&
	isset($_SESSION['docentCode'])){
	
	$q->addSubject($_POST['subjectName'], $_SESSION['docentCode']);
	header("location: ../view/overview_subjects.php");
}
	
if ($_POST['action']=="addLesson" &&
	isset($_POST['lessonName']) &&
	isset($_POST['subjectId'])){
	
	$q->addLesson($_POST['lessonName'], $_POST['subjectId']);
	header("location: ../view/overview_lessons.php?vakcode={$_POST['subjectId']}");
}	

if ($_POST['action']=="generate_code" && 
	isset($_POST['lessonId']) &&
	isset($_POST['subjectId'])){
	
	// Checks if the code doesnt exist yet
	$codeList = $q->getAllCodes();
	do{
		$duplicate = false;
		$code = rand(10000, 99999);
		echo "de code is $code <br>";
		foreach($codeList as $existingCode){
			echo $existingCode ."<br>";
			if($code == $existingCode){
				$duplicate = true;
			}
		}
	}
	while($duplicate);
	$q->updateLessonCode($_POST['lessonId'], $code);
	//header("location: ../view/overview_lessons.php?vakcode={$_POST['subjectId']}");			
	
}

?>