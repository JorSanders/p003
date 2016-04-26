<?php
session_start();


include_once("../classes/db/querymanager.php");  
include_once("../classes/model/subjectClass.php"); 

//change this when login function works
$_SESSION['user_id'] = 1;


$q = new Querymanager();


$subjectList = $q->getSubjectsFromDocent($_SESSION['user_id']);

// allow teacher to input subjectname and send that too the subjectcontroller to addSubject()
echo"Voeg nieuw vak toe: <br>
<form action='../controller/subjectcontroller.php' method='POST'>
	<input type='text' name='subject_name' placeholder='vaknaam' required>
	<input type='submit' value='+'>
	<input type='hidden' name='action' value='addSubject'>
	<input type='hidden' name='owner_id' value='{$_SESSION['user_id']}'>
</form>

";

//shows all subject names as links to show all the lessons from that subject
if (isset($subjectList)){
	foreach ($subjectList as $subject) {
		echo "<a href='overview_lessons.php?subject_id={$subject->getId()}'> ".$subject->getName() ."</a><br>";
	}   
}




?>
