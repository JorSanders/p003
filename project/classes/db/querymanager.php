<?php

require_once("mysqlconnection.php");
require_once("../classes/model/?");
require_once("../classes/model/?");

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
		$this->dbconn->query("
			DELETE FROM user
			WHERE id=$id;");
    }
	
	//Hieronder staan alle queries voor de berichten:
    ?>