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
        $role = $_POST['role'];
        $addRole = $q->addRole($role);
        header('location: ../view/AddRole.php');
    }
	
	if (($_POST['action']=='saveUserRole')) {        
		

		$user_id=$_POST['userId'];
		$role_id=$_POST['roleId'];
		$start_date=$_POST['start_date'];
		$end_date=$_POST['end_date'];


		$q->saveRoleUser($user_id, $role_id, $start_date, $end_date);
		

		
		header('location: ../view/addUserRoleDone.php');
    }	

	//AllRolesList
	if ($_GET['action']=='findAllRoles') {
		$AllRolesList = $q->findAllRoles();
		$_SESSION['AllRolesList'] = serialize($AllRolesList);
		header('Location: ../view/AllRolesList.php');
	}
	
	//one Role and its users
	if($_GET['action'] == 'findOneRole'){
		$roleList = $q->findAllFromTableWhere("id",$_GET['id'],"role");
		$_SESSION['roleList'] = serialize($roleList);
		
		$userList = $q->findUsersByRoleId($_GET['id']);
		$_SESSION['userList'] = serialize($userList);
		
		header('Location: ../view/oneRole.php');
	}





?>