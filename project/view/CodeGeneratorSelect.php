<?php
session_start();
?>
<html>

<head>
<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

<body>

	<div class="container">
			<div class="page-header">
				<h3>Lijst lessen</h3>
			</div>
<?php include_once("../includes/navbar_bootstrap.html"); ?> 

<?php

include_once("../classes/db/querymanager.php");  
include_once("../classes/model/subjectClass.php"); 

//change this when login function works
$_SESSION['user_id'] = 1;


$q = new Querymanager();


$subjectList = $q->getSubjectsFromDocent($_SESSION['user_id']);

//shows all subject names as links to show all the lessons from that subject
if (isset($subjectList)){
	echo "Kies een vak waar u een lescode voor wilt genereren. <br><br>";
	foreach ($subjectList as $subject) {
		echo "<a href='CodeGeneratorCreate.php?subject_id={$subject->getId()}'> ".$subject->getName() ."</a><br>";
	}   
} else {
	echo "U heeft nog geen vakken aangemaakt.";
}



?>

</div>
	<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
	<?php include_once("../includes/test_bootstrap.html"); ?> 

</div>
</body>

</html>
