<?php

include_once("mysqlconnection.php");
include_once("../includes/script/PDOModel.php");

class QueryManager {
   
    private $dbconn;
    
    public function __construct() {
      // OOP: instantieer een MySQLConnection-object en geef deze als resultaat 
		$this->dbconn = new MySQLConnection();  

		$this->pdomodel = new PDOModel();
		$this->pdomodel->connect("localhost", "team157_user", "0URTAeesrX", "team157_db");	  
    }
	
		
    //delete user
	// TODO make PDO
    public function deleteUser($id) {
	$this->dbconn->query("DELETE FROM user WHERE id = $id");
    $pdomodel->where("id", $id);
    $pdomodel->delete("user");
    }

    //Password check
	// TODO make PDO
    public function check_password($studentnummer, $old_password) {  //checkuser
		$result = $this->dbconn->query("SELECT * FROM user WHERE studentnummer ='$studentnummer' AND student_wachtwoord = '$old_password'");
		$row = mysqli_num_rows($result);
		return $row;
	}
    public function change_password($studentnummer, $new_password) {
		$this->dbconn->query("UPDATE student SET student_wachtwoord='$new_password' WHERE studentnummer='$studentnummer'");
    }  
	
	// Get all subjects from one teacher
	public function getSubjectsFromDocent($owner_id) {   
		$this->pdomodel->where("owner_id",$owner_id,"=");
		$this->pdomodel->orderByCols = array("subject_id DESC");
		$result =  $this->pdomodel->select("subject");
		
		if(!empty($result[0])){
			foreach($result as $dbItem){
				$subjectList[] = new Subject($dbItem['subject_id'],$dbItem['subject_name'],$dbItem['owner_id'],$dbItem['active']);
			}
			
			return $subjectList;
		}
    }
	
	// Add a subject
	public function addSubject($subject_name, $owner_id){
		$insertSubject["subject_id"] = "NULL"; 
		$insertSubject["subject_name"] = "$subject_name";
		$insertSubject["owner_id"] = "$owner_id";
		$insertSubject["active"] = "true";
		$this->pdomodel->insert("subject", $insertSubject);
		echo "name is $subject_name , and id is $owner_id <br>";
	}

	// Get all lessons from a subject
	public function getLessonsFromSubject($subject_id) {         
		$this->pdomodel->where("subject_id",$subject_id,"=");
		$this->pdomodel->orderByCols = array("lesson_id DESC");
		$result =  $this->pdomodel->select("lesson");
		
		//checks if result if empty, if its not makes lesson objects of each lesson
		if(!empty($result[0])){
			foreach($result as $dbItem){
				$lessonList[] = new Lesson($dbItem['lesson_id'],$dbItem['lesson_name'],$dbItem['code'],$dbItem['subject_id'], $dbItem['active']);
			}
		return $lessonList;
		}
    }
	
	// Add a lesson
	public function addLesson($lesson_name, $subject_id){
		$insertLesson["lesson_id"] = "NULL"; 
		$insertLesson["lesson_name"] = "$lesson_name";
		$insertLesson["code"] = 0;
		$insertLesson["subject_id"] = $subject_id;
		$insertLesson["active"] = "true";
		$this->pdomodel->insert("lesson", $insertLesson);
	}
	
	// update lesson code
	public function updateLessonCode($lesson_id, $code){
		$updateLesson["code"] = "$code";
		$this->pdomodel->where("lesson_id", $lesson_id);
		$this->pdomodel->update("lesson", $updateLesson);
	}
	
	// get all codes
	public function getAllCodes(){
		$this->pdomodel->columns = array("code");
		$result =  $this->pdomodel->select("lesson");
		
		foreach($result as $dbItem){
			$codeList[] = $dbItem['code'];
		}
				
		return $codeList;
		
	}
	 //alle rollen vinden
		public function findAllRole() {
        $result = $this->dbconn->query("SELECT * FROM role");
        
        while ($row = mysqli_fetch_array($result)) {
        $roleList[] = new Role($row['id'],$row['name'], $row['active']);
        }
        return $roleList;
    }
	
	//rol toevoegen in database
	public function addRole($id, $rol) {
      $result = array("id"=>NULL, "name"=>"$rol", "active"=>"true");
      $this->pdomodel->insert("role", $result);
  }
	
	//rol zoeken op id
	public function getRoleId($role) {
        
        // 1 rij uit de database
        $result1 = $this->dbconn->query("SELECT id FROM role WHERE name='$role'");
		return $result1;
    }
	
	//id vinden van gebruiker
	public function getUserId($name) {
        
        // 1 rij uit de database
        $result2 = $this->dbconn->query("SELECT id FROM user WHERE email='$email'");
		return $result2;
    }
	
	//new user
    public function saveUser($name ,$password, $email, $code) {
		$this->dbconn->query("INSERT into user (id, name, password, email, code, active) VALUES 
			(NULL, '$name', '$password', '$email', '$code', 'true');"); 
    }
	
	//new user_role
    public function saveRoleUser($user_id ,$role_id, $start_date, $end_date) {
		$this->dbconn->query("INSERT into user_role (id, user_id, role_id, start_date, end_date, active) VALUES 
			(NULL, '$user_id', '$role_id', '$start_date', '$end_date', 'true');"); 
    }
}
?>