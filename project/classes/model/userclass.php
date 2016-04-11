<?php

	class User{
	
	protected $password;
	protected $name; //Onthouden of het los firstname en lastname moet zijn
	protected $email;
	protected $profilepicture;
	
		
		public function __construct($password, $name, $email, $profilepicture){
			
			$this->password = $password;
			$this->name = $name;
			$this->email = $email;
			$this->profilepicture = $profilepicture;
		}
		public function getPassword() {
			return $this->password;
		}
		public function getName() {
			return $this->name;
		}	 
		public function getEmail() {
			return $this->email;
		}   
		public function getProfilePicture() {
			return $this->profilepicture;
		}   
	
	}
	
?>