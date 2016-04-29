<?php session_start();

	include_once("../classes/db/querymanager.php");
	include_once("../classes/model/userclass.php");
   	include_once("../classes/model/userstudent.php");
   	include_once("../classes/model/userdocent.php");

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

	//Change user password
	/*Wachtwoord van de user veranderen, new_password1 en 2 moeten met elkaar vergeleken worden en er moet gecontroleerd worden 
	of het wachtwoord nog beschikbaar is */
 	if (isset($_POST['studentnummer']) && isset($_POST['old_password']) && isset($_POST['new_password1'])&& isset($_POST['new_password2'])
		&&($_POST['action']=='change_password')) {
 		$studentnummer = 1;
 		$old_password =	$_POST['old_password'];
 		$check = $q->check_password($studentnummer,$old_password);
 		$_SESSION['check'] = serialize($check); 
 	}
 		elseif ($row == 1){

		if ($_POST['new_password1'] == $_POST['new_password2']){
 		$studentnummer = 1;
    	$new_password = $_POST['new_password1'];
		$user = $q->change_password($studentnummer,$new_password);
		$_SESSION['user'] = serialize($user);    
		header('Location: ../index.php');   
    	}
    	else {
    		header('Location: ../change_password'); 
    	}
    }
	
	//User toevoegen
	
	if (($_POST['action']=='saveUser')) {        
		

		$name=$_POST['name'];
		$password=$_POST['password'];
		$email=$_POST['email'];
		$code=$_POST['code'];


		$q->saveUser($name, $password, $email, $code);
		

		
		header('location: ../view/index.php');
    }	







?>
    	





?>