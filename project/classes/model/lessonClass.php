<?php

	// de code hieronder maaktt de class
	class Lesson{
		protected $absent;
		protected $student;
		
	
		public function __construct($absent, $student){
			$this->absent = $absent;
			$this->student = $student;
		}
		public function getAbsent() {
			return $this->absent;
		}	  
		public function getStudent() {
			return $this->student;
		} 
	  
	}
	
	?>