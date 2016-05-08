<?php 
session_start();

//when login function works remove this, now kevin is always the one signing in to lessons.
$_SESSION['user_id']=3;
?>


<form action="../controller/subjectController.php" method="POST">
Vul hieronder de code die je docent je heeft gegeven in.<br>
<input type="number" placeholder="Code" name="code">
<input type="hidden" name="action" value="add_user_lesson">
<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
<input type="submit" value="versturen">
</form>

<?php

if (isset($_SESSION['validCode'])){
	if($_SESSION['validCode']){
		echo "Je bent aangemeld bij de les: {$_SESSION['lesson_name']}";
	}
	else{
		echo "De code {$_SESSION['code']} is incorrect, probeer opnieuw. <br>
		Denk eraan dat de code uit 5 cijfers bestaat.";
	}
}

include("menu.php");

?>