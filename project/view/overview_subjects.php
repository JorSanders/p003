<?php
session_start();

include_once("../classes/db/querymanager.php");
include_once("../classes/model/subjectClass.php");

//change this when login function works

$_SESSION['docentCode'] = 1;


$q = new Querymanager();


$subjectList = $q->getSubjectsFromDocent(1);

echo"Voeg nieuw vak toe: <br>
<form action='../controller/subjectcontroller.php' method='POST'>
	<input type='text' name='subjectName' value='vaknaam'>
	<input type='submit' value='+'>
	<input type='hidden' name='action' value='addSubject'>
</form>

";

foreach ($subjectList as $subject) {
    echo $subject->getVaknaam() ."<br>";
}   




?>

