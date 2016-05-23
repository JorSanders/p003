<?php 
session_start(); 
?>
<!doctype html>
<html>
<head>
<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

<body>
	<?php include_once("../includes/navbar_bootstrap.html"); ?>


<div class="container">
	<div class="page-header">
    	<h3>Les toevoegen bij gebruikers</h3>
	</div>
    <form class="form-horizontal" role="form" action="../controller/subjectcontroller.php" method="post">
        <div class="form-group">
            <label class="col-sm-0 control-label"></label>
            <div class="col-sm-4">

<?php
if ( 	isset($_SESSION['userIdNameList']) &&
		isset($_SESSION['lessonIdNameList'])
	){
		$userIdNameList 	= unserialize ($_SESSION['userIdNameList']); 
		$lessonIdNameList	= unserialize ($_SESSION['lessonIdNameList']);
		unset ($_SESSION['userIdNameList']);
		unset ($_SESSION['lessonIdNameList']);
		
		//dropdown users
        echo "<div class='form-group'>";
		echo "<select class='form-control' name='user_id'>";
		echo "<div class='col-sm-0'>";
		for ($i=0;$i<count($userIdNameList);$i++){
			echo "<option value='{$userIdNameList[$i][0]}'>". $userIdNameList[$i][1] ."</option>";
		}
		echo"</select>";
		echo "<br>";
		
		//dropdown lessons
		
		echo "<select class='form-control' name='lesson_id'>";
	
		for ($i = 0; $i < count($lessonIdNameList); $i++){
			echo "<option value='{$lessonIdNameList[$i][0]}'>". $lessonIdNameList[$i][1] ."</option>";
		}
		echo"</select>";
		echo "<br>";
		
		
		echo "<input type='hidden' name='action' value='add_user_lesson_manual'>";
		echo "<input type='submit' class='btn btn-default pull-right'>";
	echo"</div>";
	echo"</div>";
	echo "</form>";
		
}else{
	header ("Location: ../controller/usercontroller.php?action=test");
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

</html>