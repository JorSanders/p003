<?php

	// de code hieronder maaktt de class
	class Subject{
		protected $id;
		protected $name;
		protected $owner_id;
		protected $active;
	
		public function __construct( $id, $name, $owner_id, $active){
			$this->id = $id;
			$this->name = $name;
			$this->owner_id = $owner_id;
			$this->active = $active;
		}
		public function getId() {
			return $this->id;
		}
		public function getName() {
			return $this->name;
		}	 
		public function getOwner_id() {
			return $this->owner_id;
		} 
		public function getActive() {
			return $this->active;
		}		
	}
	
?>