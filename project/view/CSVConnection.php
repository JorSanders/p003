<?php
$db = mysql_connect("localhost", "team157_user", "0URTAeesrX") or die("Could not connect.");
 
if(!$db) 
 
    die("no db");
 
if(!mysql_select_db("team157_db",$db))
 
    die("No database selected.");
?>
