<?php

	// de code hieronder maaktt de class
	class Subject{
		protected $vakcode;
		protected $vaknaam;
		protected $docentcode;
	
		public function __construct( $vakcode, $vaknaam, $docentcode){

			$this->vakcode = $vakcode;
			$this->vaknaam = $vaknaam;
			$this->docentcode = $docentcode;
		}
		public function getVakcode() {
			return $this->vakcode;
		}
		public function getVaknaam() {
			return $this->vaknaam;
		}	 
		public function getDocentcode() {
			return $this->docentcode;
		}   
	}
	
?>