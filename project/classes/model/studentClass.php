<?php

include_once("../classes/model/userClass.php");

	class Student extends User{
		
		protected $studentssupervisor;
		protected $studentclass;
	
	}
		public function __construct($studentssupervisor, $studentclass){
				
				$this->studentssupervisor = $studentssupervisor;
				$this->studentclass = $studentclass;
			}
			public function getStudentsSupervisor() {
				return $this->studentssupervisor;
			}	 
			public function getStudentClass() {
				return $this->studentclass;
			}   


?>