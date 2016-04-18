<?php session_start();

	include_once("../classes/db/querymanager.php");
   	include_once("../classes/model/userclass.php");

	$q = new Querymanager();

	//delete user 
	if (isset($_GET['id'])&&($_GET['action']=='JA')) {
		$id = $_GET['id'];
		$q->deleteUser($id); 
		header('Location: ../index.php'); 	
	}
	
	//delete user fail
	if (isset($_GET['id'])&&($_GET['action']=='NEE')) {
		header('Location: ../index.php'); 
       	
	}


?>