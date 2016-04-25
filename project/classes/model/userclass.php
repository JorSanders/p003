<?php

	class User{
	
	protected $id;
	protected $name; 
	protected $password;
	protected $email;
	protected $code;
	protected $active;	
		
		public function __construct($id, $password, $name, $email, $profilepicture){
			$this->id = $id;
			$this->password = $password;
			$this->name = $name;
			$this->email = $email;
			$this->profilepicture = $profilepicture;
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