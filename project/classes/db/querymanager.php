<?php

include_once("mysqlconnection.php");
include_once("../includes/script/PDOModel.php")



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

     //Password check
    public function check_password($studentnummer, $old_password) {  //checkuser
     $result = $this->dbconn->query("SELECT * FROM user WHERE studentnummer ='$studentnummer' AND student_wachtwoord = '$old_password'");
   $row = mysqli_num_rows($result);
   return $row;
}
    public function change_password($studentnummer, $new_password) {
      $this->dbconn->query("UPDATE student SET student_wachtwoord='$new_password' WHERE studentnummer='$studentnummer'");
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
	
	// update lesson code
	public function updateLessonCode($lessonId, $code){
		$this->dbconn->query("UPDATE les
		SET gegenereerde_code=$code
		WHERE lesnummer = $lessonId;"); 
	}
	
	// get all codes
	public function getAllCodes(){
		$result = $this->dbconn->query("
			SELECT gegenereerde_code
			FROM les
			WHERE gegenereerde_code >= 10000 
			AND gegenereerde_code <= 99999;");
		
		while ($row = mysqli_fetch_array($result)) {
			$codeList[] = $row['gegenereerde_code'];
        }
		
		return $codeList;
	}
}



?>