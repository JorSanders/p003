<?php
    session_start();
    require_once("../classes/db/querymanager.php");
    require_once("../classes/model/roleClass.php");
	require_once("../classes/model/userclass.php");
    
            
    $q = new Querymanager();
    
    if ($_GET['action']=='findAllRole') {
        $roleList = $q->findAllRole();
        $_SESSION['roleList'] = serialize($roleList);
		
		$userList = $q->findAllUser();
        $_SESSION['userList'] = serialize($userList);
        header('Location: ../view/addUserRole.php');
		
		
    }

    if ($_POST['action']=='insertRole' && isset($_POST['role'])){
        $rol = $_POST['role'];
        $addRole = $q->addRole($id, $rol);
        header('location: ../view/index.php');
    }
	
	if (($_POST['action']=='saveUserRole')) {        
		

		$user_id=$_POST['userId'];
		$role_id=$_POST['roleId'];
		$start_date=$_POST['start_date'];
		$end_date=$_POST['end_date'];


		$q->saveRoleUser($user_id, $role_id, $start_date, $end_date);
		

		
		header('location: ../controller/roleController.php?action=findAllRole');
    }	






?>