<?php
session_start();


include_once("../classes/db/querymanager.php");  
include_once("../classes/model/subjectClass.php"); 

//change this when login function works
$_SESSION['docentCode'] = 1;


$q = new Querymanager();


$subjectList = $q->getSubjectsFromDocent(1);

// allow teacher to input subjectname and send that too the subjectcontroller to addSubject()
echo"Voeg nieuw vak toe: <br>
<form action='../controller/subjectcontroller.php' method='POST'>
	<input type='text' name='subjectName' placeholder='vaknaam' required>
	<input type='submit' value='+'>
	<input type='hidden' name='action' value='addSubject'>
</form>

";

//shows all subject names as links to show all the lessons from that subject
foreach ($subjectList as $subject) {
    echo "<a href='overview_lessons.php?vakcode={$subject->getVakcode()}'> ".$subject->getVaknaam() ."</a><br>";
}   




?>

