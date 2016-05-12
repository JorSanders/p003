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

	if($_GET['action'] == "test"){
		$userIdList = $q->getAllFromOneCollum("id", "user");
		$lessonIdList = $q->getAllFromOneCollum("lesson_id", "lesson");

		//user name list
		foreach ($userIdList as $userId){
			$userNameList[] = $q->getAbyBfromTable("name", $userId, "id", "user");
		}

		//lesson name list
		foreach ($lessonIdList as $lessonId){
			$lessonNameList[] = $q->getAbyBfromTable("lesson_name", $lessonId, "lesson_id", "lesson");
		}
		
		//user id name list
		foreach ($userIdList as $i => $val) {
			$userIdNameList[] = array($val, $userNameList[$i]);
		}
		
		//lesson id name list
		foreach ($lessonIdList as $i => $val) {
			$lessonIdNameList[] = array($val, $lessonNameList[$i]);
		}
	
		print_r ($lessonIdNameList);
		echo "<br><br>";
		print_r ($userIdNameList);
	
		$_SESSION['userIdNameList'] 	= serialize($userIdNameList); 
		$_SESSION['lessonIdNameList'] 	= serialize($lessonIdNameList); 
		
		header ("Location: ../view/addUserLesson.php");

	}
	
		//AllUsersList
	
	if ($_GET['action']=='findAllUsers') {
		$AllUsersList = $q->findAllUsers();
		$_SESSION['AllUsersList'] = serialize($AllUsersList);
		header('Location: ../view/AllUsersList.php');
	}
	
	
	//het ding wat de database aanstuurt, om de uh de list uit de database te halen.
	if ($_GET['action']=='UserList') {
        $user_roleList = $q->getUser_roleList();
        $user = $q ->getUserList();
        $role = $q ->getRole();
        $lesson = $q ->getLesson();
        $subject = $q ->getSubject();
        $user_lesson = $q ->getUser_lesson();
        $_SESSION['user_roleList'] = serialize($user_roleList);
        $_SESSION['userList'] = serialize($user);
        $_SESSION['roleList'] = serialize($role);
        $_SESSION['lesson'] = serialize($lesson);
        $_SESSION['subject'] = serialize($subject);
        $_SESSION['user_lesson'] = serialize($user_lesson);
        header('Location: ../view/UserList.php');
    }




?>