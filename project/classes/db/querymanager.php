<?php
class QueryManager {
   
    private $dbconn;
    
    public function QueryManager() {
      // OOP: instantieer een MySQLConnection-object en geef deze als resultaat 
      $this->dbconn = new MySQLConnection();     
    }
    ?>