<?php
session_start();


include_once("../classes/db/querymanager.php");  
include_once("../classes/model/subjectClass.php"); 

//change this when login function works
$_SESSION['user_id'] = 1;


$q = new Querymanager();


$subjectList = $q->getSubjectsFromDocent($_SESSION['user_id']);

//shows all subject names as links to show all the lessons from that subject
if (isset($subjectList)){
	foreach ($subjectList as $subject) {
		echo "<a href='overview_lessons.php?subject_id={$subject->getId()}'> ".$subject->getName() ."</a><br>";
	}   
} else {
	echo "U heeft nog geen vakken aangemaakt waarvoor lessen toegevoegd kunnen worden.";
}


include("menu.php");

?>