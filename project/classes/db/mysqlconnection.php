<?php

class MySQLConnection {

    private $dbhost = 'localhost';    
    private $dbuser = 'jor';      
    private $dbpassword = '0URTAeesrX';     
    private $dbname = 'ars';      

    private $connection;     
    
    public function MySQLConnection() {
            $this->openConnection();           
    }

    public function openConnection() {
        
        $this->connection = 
                mysqli_connect($this->dbhost, 
                        $this->dbuser, 
                        $this->dbpassword, 
                        $this->dbname);
        if (!$this->connection) {
            die("Database connectie mislukte: " . mysqli_error($this->connection));
        	} 
        return $this->connection;      
    }        
    
        public function query($sql) {
        $this->last_query = $sql; 
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }     

} 

?>