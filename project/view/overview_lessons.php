<?php
session_start();

$subjectId = $_GET['vakcode'];	

include_once("../classes/db/querymanager.php");  
include_once("../classes/model/subjectClass.php"); 

$q = new Querymanager();


$lessonList = $q->getLessonsFromSubject($subjectId);

// allow teacher to input subjectname and send that too the subjectcontroller to addSubject()
/*echo"Voeg nieuw vak toe: <br>
<form action='../controller/subjectcontroller.php' method='POST'>
	<input type='text' name='subjectName' value='vaknaam'>
	<input type='submit' value='+'>
	<input type='hidden' name='action' value='addSubject'>
</form>

";*/

//shows all lesson names as links 
foreach ($lessonList as $lesson) {
    echo "<a href='overview_lessons.php?vakcode={$subject->getVakcode()}'> ".$subject->getVaknaam() ."</a><br>";
}   


?>

