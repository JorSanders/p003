<?php

include_once("mysqlconnection.php");
include_once("../includes/script/PDOModel.php");

class QueryManager {
   
    private $dbconn;
    
    public function __construct() {
       //OOP: instantieer een MySQLConnection-object en geef deze als resultaat 
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
 
	
	// Get all subjects from one teacher
	public function getSubjectsFromDocent($owner_id) {
		$this->__construct();	
	
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
		$this->__construct();	

		
		$insertSubject["subject_id"] = "NULL"; 
		$insertSubject["subject_name"] = "$subject_name";
		$insertSubject["owner_id"] = "$owner_id";
		$insertSubject["active"] = "true";
		$this->pdomodel->insert("subject", $insertSubject);
		echo "name is $subject_name , and id is $owner_id <br>";
	}

	// Get all lessons from a subject
	public function getLessonsFromSubject($subject_id) { 
		$this->__construct();	
	
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
		$this->__construct();	

		$insertLesson["lesson_id"] = "NULL"; 
		$insertLesson["lesson_name"] = "$lesson_name";
		$insertLesson["code"] = 0;
		$insertLesson["subject_id"] = $subject_id;
		$insertLesson["active"] = "true";
		$this->pdomodel->insert("lesson", $insertLesson);
	}
	
	// update lesson code
	public function updateLessonCode($lesson_id, $code){
		$this->__construct();	

		$updateLesson["code"] = "$code";
		$this->pdomodel->where("lesson_id", $lesson_id);
		$this->pdomodel->update("lesson", $updateLesson);
	}
	
	// get all codes
	public function getAllCodes(){
		$this->__construct();	

		$this->pdomodel->columns = array("code");
		$result =  $this->pdomodel->select("lesson");
		
		foreach($result as $dbItem){
			$codeList[] = $dbItem['code'];
		}
				
		return $codeList;
		
	}

	// search user Id by whatever
	public function getUserIdByWhatever($search, $name) {
	
		$result = $this->dbconn->query("SELECT * FROM user WHERE $search = '$name' ");
		
		while ($row = mysqli_fetch_array($result)) {
        $userList[] = new User($row['id'],$row['name'],$row['password'],$row['email'],$row['code'],$row['active']);
        }
        return $userList;
		
	}
	
	// add a user to a class
	public function addUser_Lesson($lesson_id, $user_id){
		$this->__construct();	

		$insertUser_lesson["lesson_id"] = $lesson_id; 
		$insertUser_lesson["user_id"] = $user_id;
		$insertUser_lesson["active"] = "true";
		$this->pdomodel->insert("user_lesson", $insertUser_lesson);
	}
	
	// gets the lesson id bases on the random code
	public function getLessonIdByCode($code){
		$this->__construct();	

		$this->pdomodel->where("code", $code,"=");
		$this->pdomodel->columns = array("lesson_id");
		$result =  $this->pdomodel->select("lesson");	
				
		//gets the lesson id from the result array
		foreach($result as $dbItem){
			$lesson_id = $dbItem['lesson_id'];
		}
			
		return $lesson_id;
	}
	
	public function getLessonNameById($lesson_id){		
		$this->__construct();	
		
		$this->pdomodel->where("lesson_id", $lesson_id,"=");
		$this->pdomodel->columns = array("lesson_name");
		$result =  $this->pdomodel->select("lesson");			

		//gets the lesson id from the result array
		foreach($result as $dbItem){
			$lesson_name = $dbItem['lesson_name'];
		}
						
		return $lesson_name;
	}
	
	// get all codes
	public function getAllFromOneCollum($column, $table){
		$this->__construct();	

		$this->pdomodel->columns = array("$column");
		$result =  $this->pdomodel->select("$table");
		
		foreach($result as $dbItem){
			$list[] = $dbItem[$column];
		}
				
		return $list;
		
	}
	
	public function getAbyBfromTable ($aName, $b, $bName, $table){
		$this->__construct();	
		
		$this->pdomodel->where("$bName", $b, "=");
		$this->pdomodel->columns = array("$aName");
		$result =  $this->pdomodel->select("$table");			

		//gets a form b the result array
		foreach($result as $dbItem){
			$a = $dbItem[$aName];
		}
						
		return $a;
	}
	
	
		//new user
    public function saveUser($name ,$password, $email, $code) {
		$this->dbconn->query("INSERT into user (id, name, password, email, code, active) VALUES 
			(NULL, '$name', '$password', '$email', '$code', 'true');"); 
	}
	
	//fin all roles
	public function findAllRole() {
        $result = $this->dbconn->query("SELECT * FROM role");
        
        while ($row = mysqli_fetch_array($result)) {
       		$roleList[] = new Role($row['id'], $row['name'], $row['active']);
        }
        return $roleList;
    }
	
	//find all users
			public function findAllUser() {
        $result = $this->dbconn->query("SELECT * FROM user");
        
        while ($row = mysqli_fetch_array($result)) {
        $userList[] = new User($row['id'],$row['name'],$row['password'],$row['email'],$row['code'],$row['active']);
        }
        return $userList;
    }
	
		//new user_role
    public function saveRoleUser($user_id ,$role_id, $start_date, $end_date) {
		$this->dbconn->query("INSERT into user_role (id, user_id, role_id, start_date, end_date, active) VALUES 
			(NULL, '$user_id', '$role_id', '$start_date', '$end_date', 'true');"); 
    }
	
		//new role
    public function addRole($role) {
		$this->dbconn->query("INSERT into role (id, name, active) VALUES 
			(NULL, '$role', 'true');"); 
    }

	//AllUsersList
    public function findAllUsers() {
        $result = $this->dbconn->query("SELECT * FROM user");
        
        while ($row = mysqli_fetch_array($result)) {
        $AllUsersList[] = new User($row['id'],$row['name'], $row['password'], $row['email'], $row['code'], $row['active']);
        }
		return $AllUsersList;
    } 
	
	//AllSubjectsList
    public function findAllSubjects() {
        $result = $this->dbconn->query("SELECT * FROM subject");
        
        while ($row = mysqli_fetch_array($result)) {
        $AllSubjectsList[] = new Subject($row['subject_id'], $row['subject_name'], $row['owner_id'], $row['active']);
        }
		return $AllSubjectsList;
    } 
	
	//AllRolesList
    public function findAllRoles() {
        $result = $this->dbconn->query("SELECT * FROM role");
        
        while ($row = mysqli_fetch_array($result)) {
        $AllRolesList[] = new Role($row['id'], $row['name'], $row['active']);
        }
		return $AllRolesList;
    } 
	
	//Password check
	// TODO make PDO
    public function check_password($id, $old_password) {  //checkuser
		$result = $this->dbconn->query("SELECT * FROM user WHERE id ='$id' AND password = '$old_password'");
		$row = mysqli_num_rows($result);
		return $row;
	}

    public function change_password($id, $new_password) {
		$this->dbconn->query("UPDATE user SET password='$new_password' WHERE id='$id'");
    }  
	
	//User list opvragen
	public function getUser_roleList(){

		//$UserList = $this->dbconn->query("SELECT user_id, role_id FROM user_role");
		$result = $this->dbconn->query("SELECT * FROM user_role");

		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$user_roleList[$i][0] = $row['id'];
        	$user_roleList[$i][1] = $row['user_id'];
        	$user_roleList[$i][2] = $row['role_id'];

		$i++;	
        }

        print_r($user_roleList);

		return $user_roleList;
	}

		public function getUserList(){
		$result = $this->dbconn->query("SELECT * FROM user");

		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$userList[$i][0] = $row['id'];
        	$userList[$i][1] = $row['name'];
        	
		$i++;	
        }

        print_r($userList);

		return $userList;
	}

		public function getRole(){
		$result = $this->dbconn->query("SELECT * FROM role");

		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$role[$i][0] = $row['id'];
        	$role[$i][1] = $row['name'];
        	
		$i++;	
        }

        print_r($role);

		return $role;
	}

		public function getLesson(){
		$result = $this->dbconn->query("SELECT * FROM lesson");

		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$lesson[$i][0] = $row['lesson_id'];
        	$lesson[$i][1] = $row['lesson_name'];
        	
		$i++;	
        }

        print_r($lesson);

		return $lesson;
	}

		public function getSubject(){
		$result = $this->dbconn->query("SELECT * FROM subject");

		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$subject[$i][0] = $row['subject_id'];
        	$subject[$i][1] = $row['subject_name'];
        	
		$i++;	
        }

        print_r($subject);

		return $subject;
	}

		public function getUser_lesson(){
		$result = $this->dbconn->query("SELECT * FROM user_lesson");

		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$user_lesson[$i][0] = $row['lesson_id'];
        	$user_lesson[$i][1] = $row['user_id'];
        	
		$i++;	
        }

		return $user_lesson;
	}
	
	// VAN MIJ
	
	public function getUser($id) {
        
        // 1 rij uit de database
        $result = $this->dbconn->query("SELECT * FROM user WHERE id=$id");
        $row = mysqli_fetch_array($result);
        // OOP: instantieer een Userobject en geef deze als resultaat
        return (new User($row['id'], $row['name'],$row['password'], $row['email'], $row['code'], $row['active']));
    }
	
	
	//update user
	public function updateUser($id, $name, $password, $email, $code, $active) {
		echo "$id, $name, $password, $email, $code, $active";
		$this->dbconn->query("UPDATE user SET name='$name', password='$password', email='$email', code='$code', active='$active' WHERE id=$id"); 
    }   

	//find all from a table where the condition matches the colname
	public function findAllFromTableWhere($colName,$condition,$table){
		$this->__construct();	
		
		$this->pdomodel->where($colName, $condition, "=");
		$result =  $this->pdomodel->select("$table");			

		echo $this->pdomodel->getLastQuery() ."<br>";		
		return $result;
	}
	
	// find the users which belong to a role id
	public function findUsersByRoleId($role_id){
		$this->pdomodel->joinTables("user_role", "role.id = user_role.role_id","INNER JOIN");
		$this->pdomodel->joinTables("user", "user.id = user_role.user_id","INNER JOIN");
		
		$this->pdomodel->where("role.id", $role_id, "=");
		
		$this->pdomodel->columns = array("user.id", "user.name", "user.email", "user.code", "user.active");
		
		$result =  $this->pdomodel->select("role");
		return $result;
	}
	
	// find the roles which belong to a user id
	public function findRolesByUserId($user_id){
		$this->pdomodel->joinTables("user_role", "user.id = user_role.user_id", "INNER JOIN");
		$this->pdomodel->joinTables("role", "role.id = user_role.role_id", "INNER JOIN");
		
		$this->pdomodel->where("user.id", $user_id, "=");
		
		$this->pdomodel->columns = array("role.id", "role.name", "user.active");
		
		$result =  $this->pdomodel->select("user");

		return $result;
	}
	

	// find the subjects which belong to a user id
	public function findSubjectsByUserId($user_id){
		
		$this->pdomodel->joinTables("subject", "user.id = subject.owner_id", "INNER JOIN");
		
		$this->pdomodel->where("user.id", $user_id, "=");
		
		$this->pdomodel->columns = array("subject.subject_id", "subject.subject_name", "subject.owner_id", "subject.active");
		
		$result =  $this->pdomodel->select("user");
		return $result;
	}
		
	// find the users which belong to a lesson id
	public function findUsersByLessonID($lesson_id){
		
		$this->pdomodel->joinTables("user_lesson", "lesson.lesson_id = user_lesson.lesson_id", "INNER JOIN");
		$this->pdomodel->joinTables("user", "user.id = user_lesson.user_id", "INNER JOIN");
		
		$this->pdomodel->where("lesson.lesson_id", $lesson_id, "=");
		
		$this->pdomodel->columns =  array("user.id", "user.name", "user.email", "user.code", "user.active");
		
		$result =  $this->pdomodel->select("lesson");

		return $result;
	}
	
		// find the lessons which belong to a user id
	public function findLessonsByUserId($user_id){
		$this->pdomodel->joinTables("user_lesson", "user.id = user_lesson.user_id", "INNER JOIN");
		$this->pdomodel->joinTables("lesson", "lesson.lesson_id = user_lesson.lesson_id", "INNER JOIN");
		
		$this->pdomodel->where("user.id", $user_id, "=");
		
		$this->pdomodel->columns = array("lesson.lesson_id", "lesson.lesson_name", "lesson.code", "lesson.subject_id", "lesson.active");
		
		$result =  $this->pdomodel->select("user");

		return $result;
	}

	//find all users
			public function findAllDocent() {
        $result = $this->dbconn->query("SELECT user_id 
										 FROM user_role
										 WHERE role_id = '29'");
		
		//$result2 = $this->
        
        while ($row = mysqli_fetch_array($result)) {
        $docentList[] = new User($row['id'],$row['name'],$row['password'],$row['email'],$row['code'],$row['active']);
        }
		print_r($docentList);
        return $docentList;
    }

	

	//login user
	public function loginUser($code, $password) {  //checkuser
     $result = $this->dbconn->query("SELECT * FROM user WHERE code ='$code' AND password = '$password'");
		$row = mysqli_fetch_array($result);
	    return (new User($row['id'], $row['name'],$row['password'], $row['email'], $row['code'], $row['active']));

    }
	
	//get password by id
	public function getValueFromColumn($columnToGetFrom, $whereColumnIs, $whereValue, $table){
		$this->__construct();
		
		$this->pdomodel->where($whereColumnIs, $whereValue);
		$this->pdomodel->columns = array($columnToGetFrom);
		$result =  $this->pdomodel->select($table);
		return $result;
	}
	
	public function updateColumn($columnToUpdate, $value, $whereColumnIs, $whereValue, $table){
		$updateData["$columnToUpdate"] = $value;
		$this->pdomodel->where("$whereColumnIs", $whereValue);
		$this->pdomodel->update("$table", $updateData);
	}
	

}

	

?>