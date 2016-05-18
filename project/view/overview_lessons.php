<?php
session_start();

$subject_id = $_GET['subject_id'];	

include_once("../classes/db/querymanager.php");  
include_once("../classes/model/lessonClass.php"); 

$q = new Querymanager();


$lessonList = $q->getLessonsFromSubject($subject_id);

//allow teacher to input lesson name and send that too the subjectcontroller to addLesson()
echo"
Voeg nieuwe les toe: <br>
<form action='../controller/subjectcontroller.php' method='POST'>
	<input type='text' name='lesson_name' placeholder='lesnaam' required>
	<input type='submit' value='+'>
	<input type='hidden' name='action' value='addLesson'>
	<input type='hidden' name='subject_id' value='{$_GET['subject_id']}'>
	
</form>

";

include("menu.php");
?>

