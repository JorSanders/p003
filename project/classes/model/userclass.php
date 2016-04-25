<?php

	class User{
	
	protected $id;
	protected $name; 
	protected $password;
	protected $email;
	protected $code;
	protected $active;	
		
		public function __construct($id, $name, $password, $email, $code, $active){
			$this->id = $id;
			$this->name = $name;
			$this->password = $password;
			$this->email = $email;
			$this->code = $code;
			$this->active = $active;
		}
		public function getId() {
			return $this->id;
		}   
		public function getName() {
			return $this->name;
		}
		public function getPassword() {
			return $this->password;
		}	 
		public function getEmail() {
			return $this->email;
		}   
		public function getCode() {
			return $this->code;
		} 
		public function getActive() {
			return $this->active;
		} 
	}
	
?>