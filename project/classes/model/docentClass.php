<?php

include_once("userClass.php");

	class Teacher extends User{
		
		protected $abbrevation; //Abbrevation = afkorting
		protected $studentsupervisor;
		protected $admin;
		protected $subject;
		protected $classes;
	
	
		public function __construct($abbrevation, $studentsupervisor, $admin, $subject, $classes){
				
				$this->abbrevation = $abbrevation;
				$this->studentsupervisor = $studentsupervisor;
				$this->admin = $admin;
				$this->subject = $subject;
				$this->classes = $classes;
			}
			public function getAbbrevation() {
				return $this->abbrevation;
			}
			public function getStudentSupervisor() {
				return $this->studentsupervisor;
			}
			public function getAdmin() {
				return $this->admin;
			}   			
			public function getSubject() {
				return $this->subject;
			}   
			public function getClasses() {
				return $this->classes;
			}   
	}

?>