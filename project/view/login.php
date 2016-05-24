<?php session_start(); ?>
<!doctype html>

<html>

<head>
    <title>Inloggen</title>
    <?php include_once("../includes/head_bootstrap.html"); ?>
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h3>Login</h3>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <?php include_once("../includes/navbar_bootstrap.php"); ?> 

			<form action="../controller/usercontroller.php" method="post" class="form-horizontal" role="form">
				<input name="action" type="hidden" value="login"/>
					<div class="form-group has-feedback">	
						<label class="col-sm-2 control-label">Voornaam:</label>
						<div class="col-sm-4">
				  			<input name="code" type="text" class="form-control" id="focusedInput" />
				  		</div>
				  	</div>
				  	<div class="form-group has-feedback">	
						<label class="col-sm-2 control-label">Wachtwoord:</label>
						<div class="col-sm-4">
				 			<input name="password" type="password" class="form-control" id="focusedInput" />
				 		</div>
				 	</div>
				 <div class="form-group has-feedback">
					<div class="col-sm-6">
				 		<button class="submit btn btn-default pull-right" type="submit">Inloggen</button>
				 	</div>
				 </div>
			</form>
		
			</div>
		</div>
	</div>

		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
	</body>
</html>