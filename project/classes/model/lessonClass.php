<?php

	// de code hieronder maaktt de class
	class Lesson{
		protected $id;
		protected $code;
		protected $subjectId;
		
	
		public function __construct($id, $code, $subjectId){
			$this->id = $id;
			$this->code = $code;
			$this->subjectId = $subjectId;
		}
		public function getId() {
			return $this->id;
		}	  
		public function getCode() {
			return $this->code;
		} 
		public function getSubjectId() {
			return $this->subjectId;
		} 	  
	}
	
	?>