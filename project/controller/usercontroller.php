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
 	if (
		$_POST['action']=='change_password' && 
		isset($_POST['old_password']) && 
		isset($_POST['new_password1']) && 
		isset($_POST['new_password2']) && 
		isset($_POST['user_id'])
	) {
		//encript the old password so its unhackable
		$oldPassWord = md5($_POST['old_password']);
		
		//check if the old password is correct 
		$columnToGetFrom = "password";
		$whereColumnIs = "id";
		$whereValue = $_POST['user_id'];
		$table = "user";
		$password = $q->getValueFromColumn($columnToGetFrom, $whereColumnIs, $whereValue, $table);		
		$password = $password[0]['password'];
		
		//if the oldpassword isnt correct send the user back
		if($oldPassWord == $password){		
			//header("location: ../view/changePassword.php");
		
			//check if both new passwords match
			if($_POST['new_password1'] == $_POST['new_password2']){
				//header("location: ../view/changePassword.php");
			
				$newPass = md5($_POST['new_password1']);
				
				//update the password
				$columnToUpdate = "password";
				$value = $newPass;
				$whereColumnIs = "id";
				$whereValue = $_POST['user_id'];
				$table = "user";
				$q->updateColumn($columnToUpdate, $value, $whereColumnIs, $whereValue, $table);
				header("Location: ../view/index.php");

			}
			else{
				header("Location: ../view/changePassword.php?error=wachtwoorden zijn niet gelijk");
			}
			
		}
		else{
			header("Location: ../view/changePassword.php?error=oude wachtwoord klopt niet");
		}
 
 	}
 
	
	//User toevoegen
	
	if (($_POST['action']=='saveUser')) {        
		

		$name=$_POST['name'];
		$password=$_POST['password'];
		$password = md5($password);
		$email=$_POST['email'];
		$code=$_POST['code'];


		$q->saveUser($name, $password, $email, $code);
		

		header('location: ../view/addUserDone.php');
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
	
	//update user Lisanne
	if (isset($_POST['id'])&&($_POST['action']=='update')) {

	$id = $_POST['id'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$password = md5($password);
	$email = $_POST['email'];
	$code= $_POST['code'];
	$active= $_POST['active'];
	if(!isset($active)){
		$active = "false";
	}
	$q->updateUser($id, $name, $password, $email, $code, $active);
	$User = $q->getUser($id);
	$_SESSION['User'] =serialize($User);
	header('Location: ../view/AllUsersList.php');
	}	

	//haal een user op uit de database
	if ($_GET['action']=='getUser') {
	$id = $_GET['id'];
	$User = $q->getUser($id);
	$_SESSION['User'] =serialize($User);
	header('Location: ../view/updateUser.php'); 
	}
	

	//one user and its subjects and roles and its lessons
	if($_GET['action'] == 'findOneUser'){
		$userList = $q->findAllFromTableWhere("id",$_GET['id'],"user");
		$_SESSION['userList'] = serialize($userList);
		
		$roleList = $q->findRolesByUserId($_GET['id']);
		$_SESSION['roleList'] = serialize($roleList);
		
		$subjectList = $q->findSubjectsByUserId($_GET['id']);
		$_SESSION['subjectList'] = serialize($subjectList);
		
		$lessonList = $q->findLessonsByUserId($_GET['id']);
		for ($i = 0; $i < count($lessonList); $i++){
			$subject = $q->findAllFromTableWhere("subject_id",$lessonList[$i]["subject_id"],"subject");
			$lessonList[$i]['subject_name'] = $subject[0]["subject_name"];
		}
		$_SESSION['lessonList'] = serialize($lessonList);

		
		header('Location: ../view/oneUser.php');
	}

	//Update Role
    if ($_POST['action']=='updateRole'){
    	$id = $_POST['id'];
    	$Role = $_POST['Role'];
    	$updateRole = $q ->updateRole($id,$Role);
    	$_SESSION['updateRole'] = serialize($updateRole);
    	header('location: ../view/userList.php?action=UserList');
    }
	
	    if ($_GET['action']=='findAllDocent') {
        $docentList = $q->findAllDocent();
        $_SESSION['docentList'] = serialize($docentList);

        //header('Location: ../view/overview_subjects.php');
		
		
    }
	


		//inloggen
	if (isset($_POST['code']) && isset($_POST['password'])&&($_POST['action']=='login')) {
		$code = $_POST['code']; 
		$password = md5($_POST['password']);
		$userDetails = $q->loginUser($code, $password);
		$_SESSION['id'] = $userDetails->getId();
		$_SESSION['code'] = $userDetails->getCode();
		$_SESSION['username'] = $userDetails->getName();
		$_SESSION['password'] = $userDetails->getPassword();
		echo "$code ".$userDetails->getCode() ."
			$password ".$userDetails->getPassword();
		if($code==$userDetails->getCode() &&
			$password==$userDetails->getPassword()){
			header('Location: ../view/index.php');
			}
		else {
			header('Location:../view/login.php'); 		
		}
	}
	//uitloggen
	if (($_GET['submit']=="submit")&&($_GET['action']=='logout')) {
	 session_destroy();	
     header('Location: ../view/logout.php');
	}

?>