<?php
session_start();

	include_once("../classes/db/mysqlconnection.php");
	include_once("../includes/script/PDOModel.php");		
    require_once("../classes/model/subjectClass.php");


		$pdomodel = new PDOModel();
		$pdomodel->connect("localhost", "team157_user", "0URTAeesrX", "team157_db");	  

	
	

$records = $pdomodel->select("subject"); //get data from table
$pdomodel->arrayToCSV($records, "Subjects.csv");//export it to csv

	


	
?>