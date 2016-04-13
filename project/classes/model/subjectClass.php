<?php

	// de code hieronder maaktt de class
	class Subject{
		protected $code;
		protected $absent;
		protected $name;
		protected $teacher;
		protected $student;
		protected $day;
	
		public function __construct( $code, $absent, $name, $teacher, $student, $date){

			$this->code = $code;
			$this->absent = $absent;
			$this->name = $name;
			$this->teacher = $teacher;
			$this->student = $student;
			$this->day = $day;
		}
		public function getCode() {
			return $this->code;
		}
		public function getAbsent() {
			return $this->absent;
		}	 
		public function getName() {
			return $this->name;
		}   
		public function getTeacher() {
			return $this->teacher;
		} 
		public function getStudent() {
			return $this->student;
		} 
		public function getDay() {
			return $this->day;
		}  
	}
	
?>