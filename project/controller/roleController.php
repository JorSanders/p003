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

    if ($_POST['action']=='addRole' && isset($_POST['rol'])){
        $rol = $_POST['rol'];
        $addRole = $q->addRole($id, $rol);
        $_SESSION['addRole'] = serialize($addRole);
        header('location: ../view/index.php');
    }






?>