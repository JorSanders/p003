<?php

	// de code hieronder maaktt de class
	class Lesson{
		protected $id;
		protected $name;
		protected $code;
		protected $subjectId;
		
	
		public function __construct($id, $name, $code, $subjectId){
			$this->id = $id;
			$this->name = $name;
			$this->code = $code;
			$this->subjectId = $subjectId;
		}
		public function getId() {
			return $this->id;
		}	  
		public function getName() {
			return $this->name;
		}
		public function getCode() {
			return $this->code;
		} 
		public function getSubjectId() {
			return $this->subjectId;
		} 	  
	}
	
	?>