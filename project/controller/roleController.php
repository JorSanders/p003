<?php
    session_start();
    require_once("../classes/db/querymanager.php");
    require_once("../classes/model/roleClass.php");
	
			
    $q = new Querymanager();
	
		if (($_GET['action']=='findAllRole')) {
    $roleList = $q->findAllRole();
    $_SESSION['roleList'] = serialize($roleList);
    header('Location: ../view/new_user_form.php');
		}

    if ($_GET['action']=='addRole' && isset($_GET['rol'])){
        $rol = $_GET['rol'];
        $addRole = $q->addRole($id, $rol);
        header('location: ../view/index.php');
    }






?>