<?php
session_start();

if(!isset($_SESSION['name'])||!isset($_SESSION['password'])) {

die (header('Location: ../view/login.php')); 

}

else {

    require_once("../classes/db/querymanager.php");
   	require_once("../classes/model/userclass.php");
	
    $q = new querymanager();

   	 if (isset($_SESSION['name']) && isset($_SESSION['password'])) {
	 $name = $_SESSION['name']; 
	 $password = $_SESSION['password'];
     $login = $q->loginUser(name, $password);
	 $_SESSION['login'] = serialize($login);
	 $_SESSION['name'] = $name;
	 $_SESSION['password'] = $password;
	
	 }
}

$login = unserialize($_SESSION['login']);
if ($login!=1||$login>1){
session_destroy();
die (header('Location: ../view/login.php')); 
} 

?>