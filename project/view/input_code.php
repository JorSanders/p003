<?php 
session_start();


?>

<html>

<head>
 	<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

<body>
<?php include_once("../includes/navbar_bootstrap.html"); ?>

<div class="container">
	
	<div class="page-header">
		<h3>Aanwezigheidscode</h3>
	</div>
	<form class="form-horizontal" role="form" action="../controller/subjectcontroller.php" method="post">
	    		<div class="form-group">
	      			<label class="col-sm-0 control-label"></label>
	      			<div class="col-sm-6">
	
	
	<span class="col-sm-12">Vul hieronder de code die je docent je heeft gegeven in.</span><br></br>
	<div class="form-group has-feedback">
		<label class="col-sm-3 control-label">Voer code in:</label>
		<div class="col-sm-4">
			<input class="form-control" id="focusedInput" type="number" placeholder="Code" name="code">
		</div>
	</div>
	<br>
	Wat vul je in om je aan te melden:
	<select name="search">
		<option value = "name">naam</option>
		<option value = "email">emailadres</option>
		<option value = "code">code</option>
	</select>
	<br><br>
	
	Typ het hier:
	<input type = "text" name = "name" >
	<br><br>
	
	<input type="hidden" name="action" value="add_user_lesson">

	<div class="form-group has-feedback">
        <div class="col-sm-7">
			<input class="btn btn-default pull-right" type="submit" value="versturen">
		</div>
	</div>
	</form>


<?php

if (isset($_SESSION['validCode'])){
	if($_SESSION['validCode']){
		echo "<span class=\"help-block pull-left\"> Je bent aangemeld bij de les: {$_SESSION['lesson_name']}</span>";

	}
	else{
		echo "<span class=\"help-block pull-left\"> De code {$_SESSION['code']} is incorrect, probeer opnieuw. <br>
		Denk eraan dat de code uit 5 cijfers bestaat.</span>";
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