<?php 
session_start(); 

?>
<!DOCTYPE html>
<html>
    <head>
<<<<<<< HEAD
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
=======
        <?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>

    <body>
        <?php include_once("../includes/navbar_bootstrap.html"); ?>
        
        <div id="content">
        <div class="container">
            <br></br>
            <h2>Nieuwe gebruiker: </h2>
            <form class="form-horizontal" role="form" action="../controller/usercontroller.php" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">

        
            
              <br><br>

            
                    <input name="action" type="hidden" value="saveUser" />
                <br>
                <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Naam:</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="focusedInput" type="text" name="Role" placeholder="Naam" required /><br>
                    </div>
                </div>
				<div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Wachtwoord:</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="focusedInput" type="password" name="password"  placeholder="wachtwoord" required/>
                    </div>
                </div>
				<div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Email:</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="focusedInput" type="text" name="email"  placeholder="emailadres" required/>
                    </div>
                </div>
				<div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Code:</label>
                    <div class="col-sm-4">
				        <input class="form-control" id="focusedInput" type="text" name="code" placeholder="Code" required/>
                    </div>
                </div>
                
                <div class="form-group has-feedback">
                    <div class="col-sm-8">
                <button type="submit" class="btn btn-default pull-right">Account aanmaken</button>
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
>>>>>>> Bart!
</html>