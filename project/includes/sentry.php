<?php
session_start();

if(!isset($_SESSION['id'])||!isset($_SESSION['password'])) {

	die (header('Location: ../view/login.php')); 

}

else {

    require_once("../classes/db/querymanager.php");
   	require_once("../classes/model/userclass.php");
	
    $q = new querymanager();

	$userDetails = $q->loginUser($_SESSION['code'], $_SESSION['password']);
	if($_SESSION['id']==$userDetails->getId() &&
	   $_SESSION['password']==$userDetails->getPassword()){
		//header('Location: ../view/index.php');
		}
	else {
		//header('Location:../view/login.php'); 		
	}
	
}


?>