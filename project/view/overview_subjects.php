<?php
session_start();
?>

<head>
<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

<body>

	<?php include_once("../includes/navbar_bootstrap.html"); ?>

<?php
include_once("../classes/db/querymanager.php");  
include_once("../classes/model/subjectClass.php"); 

//change this when login function works
$_SESSION['user_id'] = 1;


$q = new Querymanager();


$subjectList = $q->getSubjectsFromDocent($_SESSION['user_id']);
?>
 
       
        	<div class="container">
        		<div class="page-header">
            	<h3>Voeg nieuw vak toe: </h3>
           		</div>
				<form class="form-horizontal" role="form" action="../controller/subjectcontroller.php" method="post">
                	<div class="form-group">
                    	<div class="col-sm-6">
              

<?php
// allow teacher to input subjectname and send that too the subjectcontroller to addSubject()
echo"<br>
	 <div class='form-group has-feedback'>
        <div class='col-sm-6'>
			<input class='form-control' id='focusedInput' type='text' name='subject_name' placeholder='vaknaam' required>
		</div>
	</div>
		<div class='form-group has-feedback'>
        	<div class='col-sm-4'>
				<button class='btn btn-default glyphicon glyphicon-plus' type='submit' value='+'>Toevoegen</button>
			</div>
		</div>
		

	<input type='hidden' name='action' value='addSubject'>
	<input type='hidden' name='owner_id' value='{$_SESSION['user_id']}'>
</form>

";

//shows all subject names as links to show all the lessons from that subject
if (isset($subjectList)){
	foreach ($subjectList as $subject) {
		echo "<a href='overview_lessons.php?subject_id={$subject->getId()}'> ".$subject->getName() ."</a><br>";
	}   
}




?>
</div>
</div>
</div>

	<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
	<?php include_once("../includes/test_bootstrap.html"); ?> 

</body>
