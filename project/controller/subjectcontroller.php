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

?>