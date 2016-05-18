<?php 
session_start(); 

?>
<!DOCTYPE html>
<html>
    <head>
	<?php include_once("../includes/head_bootstrap.html"); ?> 
	<title> addUser.php </title>
    </head>

    <body>
		<?php include_once("../includes/navbar_bootstrap.html"); ?> 

			<div class= "container">
				<div class= "page-header">
					
						<h3> Nieuwe gebruiker aanmaken </h3>
						  
				</div>
					
						<form method="POST" action='../controller/usercontroller.php' >
								<input name="action" type="hidden" value="saveUser" />
							Naam:<br>
							<input type="text" name="name" placeholder="naam" required/><br/>
							<br>wachtwoord:<br/>
							<input type="password" name="password"  placeholder="wachtwoord" required/><br/>
							<br>email:<br/>
							<input type="text" name="email"  placeholder="emailadres" required/><br/>
							<br>Code:<br/>
							<input type="text" name="code" placeholder="Code" required/><br/><br>


							<input type="submit" name="submit">
						</form>
					
			</div>	
      

	</body>
	<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
	<?php include_once("../includes/test_bootstrap.html"); ?> 
</html>