<?php

include_once("mysqlconnection.php");

include_once("../classes/model/docentClass.php");
include_once("../classes/model/lessonClass.php");
include_once("../classes/model/studentClass.php");
include_once("../classes/model/subjectClass.php");


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
	
	public function getSubjectsFromDocent($docentcode){
		$result = $this->dbconn->query("
			SELECT vakcode, vaknaam, docentcode
			FROM vak
			WHERE docentcode = $docentcode");
		
		while ($row = mysqli_fetch_array($result)) {
			$subjectList[] = new subject($row['vakcode'],$row['vaknaam'],$row['docentcode']);
        }
        return $subjectList;
	}

}

?>