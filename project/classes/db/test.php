<?php

include 'mysqlconnection.php';

class QueryManager {
   
    private $connection;
    
    public function QueryManager() {
      // OOP: instantieer een MySQLConnection-object en geef deze als resultaat 
      $this->connection = new MySQLConnection();     
    }

public function findAllUsers() {         
        $result = $this->connection->sql("SELECT * FROM user");
        // OOP: alle users:
        while ($row = mysqli_fetch_array($result)) {
        $userList[] = new User($row['docentcode'],$row['firstname'],$row['lastname'], $row['phonenumber'], $row['password']);
        }
        return $userList;
}
new $userlist;

echo $userlist;

?>