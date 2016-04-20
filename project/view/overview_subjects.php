<?php

include_once("../classes/db/querymanager.php");
include_once("../classes/model/subjectClass.php");

$q = new Querymanager();


$subjectList[] = $q->getSubjectsFromDocent(1);

foreach ($subjectList as $subject) {
    echo $subject->getVaknaam() ."<br>";
    }   
	echo "einde";



?>

