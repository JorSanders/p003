<?php
session_start();
?>

<head>
<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

<body>
	<?php include_once("../includes/navbar_bootstrap.html"); ?>
<?php
$subject_id = $_GET['subject_id'];	

include_once("../classes/db/querymanager.php");  
include_once("../classes/model/lessonClass.php"); 

$q = new Querymanager();


$lessonList = $q->getLessonsFromSubject($subject_id);
?>

        
        	<div class="container">
        		<div class="page-header">
            		<h3>Voeg nieuwe les toe: </h3>
            	</div>
           		<form class="form-horizontal" role="form" action="../controller/subjectcontroller.php" method="post">
                	<div class="form-group">
                    	<div class="col-sm-6">
              
<?php
//allow teacher to input lesson name and send that too the subjectcontroller to addLesson()
echo"
 <br>
	<div class='form-group has-feedback'>
    	<div class='col-sm-6'>
			<input class='form-control' id='focusedInput' type='text' name='lesson_name' placeholder='lesnaam' required>
		</div>
	</div>
	<div class='form-group has-feedback'>
        <div class='col-sm-6'>
			<button class='btn btn-default glyphicon glyphicon-plus pull-right' type='submit' value='+'>Toevoegen</button>
		</div>
	</div>
	<input type='hidden' name='action' value='addLesson'>
	<input type='hidden' name='subject_id' value='{$_GET['subject_id']}'>
	
</form>

";

?>
</div>
</div>
</div>
</div>
	<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
	<?php include_once("../includes/test_bootstrap.html"); ?> 

</body>

