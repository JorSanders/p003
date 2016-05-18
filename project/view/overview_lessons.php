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

        <div id="content">
        	<div class="container">
        		<br></br>
            	<h2>Voeg nieuwe les toe: </h2>
           		<form class="form-horizontal" role="form" action="../controller/subjectcontroller.php" method="post">
                	<div class="form-group">
                    	<div class="col-sm-6">
              <br><br>
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
        <div class='col-sm-4'>
			<button class='btn btn-default glyphicon glyphicon-plus pull-right' type='submit' value='+'>Toevoegen</button>
		</div>
	</div>
	<input type='hidden' name='action' value='addLesson'>
	<input type='hidden' name='subject_id' value='{$_GET['subject_id']}'>
	
</form>

";
//shows all lesson names as links 
if (isset($lessonList)){
	foreach ($lessonList as $lesson) {
		echo /*"<a href='overview_lessons.php?vakcode={$lesson->get_id()}'> ".*/$lesson->getName() ."</a> ";
		if ($lesson->getCode() == 0){
			echo "<form style='display:inline-block;' action='../controller/subjectcontroller.php' method='POST'>
			<button class='btn btn-default' type='submit'>Creeer code</button>
			<input type='hidden' name='lesson_id' value='{$lesson->getId()}'> 
			<input type='hidden' name='subject_id' value='$subject_id'> 
			<input type='hidden' name='action' value='generate_code'>
			</form>";		
		}else if($lesson->getCode() == 1){
			echo "les is al gesloten";
		}else{
			echo $lesson->getCode();
		}	
		
	   echo "<br>";
	}
}


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

