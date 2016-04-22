<?php
session_start();

$subjectId = $_GET['vakcode'];	

include_once("../classes/db/querymanager.php");  
include_once("../classes/model/lessonClass.php"); 

$q = new Querymanager();


$lessonList = $q->getLessonsFromSubject($subjectId);

//allow teacher to input lesson name and send that too the subjectcontroller to addLesson()
echo"Voeg nieuwe les toe: <br>
<form action='../controller/subjectcontroller.php' method='POST'>
	<input type='text' name='lessonName' placeholder='lesnaam' required>
	<input type='submit' value='+'>
	<input type='hidden' name='action' value='addLesson'>
	<input type='hidden' name='subjectId' value='$subjectId'>
	
</form>

";

//shows all lesson names as links 
foreach ($lessonList as $lesson) {
    echo /*"<a href='overview_lessons.php?vakcode={$lesson->getId()}'> ".*/$lesson->getName() ."</a> ";
	
	
	if ($lesson->getCode() == 0){
		echo "
			<form style='display:inline-block' action='../controller/subjectcontroller.php' method='POST'>
				<input type='submit' value='creeer code'>
				<input type='hidden' name='lessonId' value='{$lesson->getId()}'> 	
				<input type='hidden' name='subjectId' value='$subjectId'> 	
				<input type='hidden' name='action' value='generate_code'>
			</form>";		
	}else if($lesson->getCode() == 1){
		echo "les is gesloten";
	}else{
		echo $lesson->getCode();
	}	
	
   echo "<br>";
}

?>
