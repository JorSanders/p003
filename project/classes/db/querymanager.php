<?php

include_once("mysqlconnection.php");
include_once("../model/docentClass.php");
include_once("../model/lessonClass.php");
include_once("../model/studentClass.php");
include_once("../model/subjectClass.php");
include_once("../model/userClass.php");

class QueryManager {
   
    private $dbconn;
    
    public function __construct() {
      // OOP: instantieer een MySQLConnection-object en geef deze als resultaat 
      $this->dbconn = new MySQLConnection();     
    }
	
	//Hieronder staan alle queries voor de users:
		
    //delete user
    public function deleteUser($id) {
		//gedaan
		$this->dbconn->query("DELETE FROM user WHERE id = $id");
    }
	
}

?>