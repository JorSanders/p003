<?php

include_once("mysqlconnection.php");



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
	
	// Get all subjects from one teacher
	public function getSubjectsFromDocent($docentcode) {         
        $result = $this->dbconn->query("
			SELECT vakcode, vaknaam, docentcode
			FROM vak
			WHERE docentcode = $docentcode
			ORDER BY vakcode DESC");
			
        while ($row = mysqli_fetch_array($result)) {
			$subjectList[] = new Subject($row['vakcode'],$row['vaknaam'],$row['docentcode']);
        }

        return $subjectList;
    }
	
	// Add a subject
	public function addSubject($vaknaam, $docentCode){
		$this->dbconn->query("INSERT into vak (vakcode, vaknaam, docentcode) VALUES 
		(NULL, '$vaknaam', $docentCode);"); 
	}

	// Get all subjects from one teacher
	public function getLessonsFromSubject($subjectId) {         
        $result = $this->dbconn->query("
			SELECT lesnummer, lesnaam, gegenereerde_code, vakcode
			FROM les
			WHERE vakcode = $subjectId
			ORDER BY lesnummer DESC");
			
        while ($row = mysqli_fetch_array($result)) {
			$lessonList[] = new Lesson($row['lesnummer'],$row['lesnaam'],$row['gegenereerde_code'],$row['vakcode']);
        }
        return $lessonList;
    }
	
	// Add a subject
	public function addLesson($lessonName, $subjectId){
		$this->dbconn->query("INSERT into les (lesnummer, lesnaam, gegenereerde_code, vakcode) VALUES 
		(NULL, '$lessonName', 0, $subjectId);"); 
	}
	
}



?>