<?php
    session_start();
    require_once("../classes/db/querymanager.php");
    require_once("../classes/model/roleClass.php");
    
            
    $q = new Querymanager();
    
    if ($_GET['action']=='findAllRole') {
        $roleList = $q->findAllRole();
        $_SESSION['roleList'] = serialize($roleList);
        header('Location: ../view/new_user_form.php');
    }

    if ($_POST['action']=='insertRole' && isset($_POST['role'])){
        $rol = $_POST['role'];
        $addRole = $q->addRole($id, $rol);
        header('location: ../view/index.php');
    }





?>