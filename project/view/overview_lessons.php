<?php
session_start();

$subject_id = $_GET['subject_id'];	

include_once("../classes/db/querymanager.php");  
include_once("../classes/model/lessonClass.php"); 

$q = new Querymanager();


$lessonList = $q->getLessonsFromSubject($subject_id);

//allow teacher to input lesson name and send that too the subjectcontroller to addLesson()
echo"
Voeg nieuwe les toe: <br>
<form action='../controller/subjectcontroller.php' method='POST'>
	<input type='text' name='lesson_name' placeholder='lesnaam' required>
	<input type='submit' value='+'>
	<input type='hidden' name='action' value='addLesson'>
	<input type='hidden' name='subject_id' value='{$_GET['subject_id']}'>
	
</form>

";
//shows all lesson names as links 
if (isset($lessonList)){
	foreach ($lessonList as $lesson) {
		echo /*"<a href='overview_lessons.php?vakcode={$lesson->get_id()}'> ".*/$lesson->getName() ."</a> ";
		
		if ($lesson->getCode() == 0){
			echo "<form action='../controller/subjectcontroller.php' method='POST'>
			<input type='submit' value='creeer code'>
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

