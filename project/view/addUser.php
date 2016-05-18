<?php 
session_start(); 

?>
<!DOCTYPE html>
<html>
    <head>

        <?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>

    <body>
        <?php include_once("../includes/navbar_bootstrap.html"); ?>
        
        
        <div class="container">
		
            
           <div class="page-header">
		   <h3>Nieuwe gebruiker: </h3>
            </div>
			
			<form class="form-horizontal" role="form" action="../controller/usercontroller.php" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-0">

        
            
              

            
                    <input name="action" type="hidden" value="saveUser" />
                <br>
                <div class="form-group has-feedback">
                    <label class="col-sm-1 control-label">Naam:</label>
                    <div class="col-sm-2">
                        <input class="form-control" id="focusedInput" type="text" name="Role" placeholder="Naam" required /><br>
                    </div>
                </div>
				<div class="form-group has-feedback">
                    <label class="col-sm-1 control-label">Wachtwoord:</label>
                    <div class="col-sm-2">
                        <input class="form-control" id="focusedInput" type="password" name="password"  placeholder="wachtwoord" required/>
                    </div>
                </div>
				<div class="form-group has-feedback">
                    <label class="col-sm-1 control-label">Email:</label>
                    <div class="col-sm-2">
                        <input class="form-control" id="focusedInput" type="text" name="email"  placeholder="emailadres" required/>
                    </div>
                </div>
				<div class="form-group has-feedback">
                    <label class="col-sm-1 control-label">Code:</label>
                    <div class="col-sm-2">
				        <input class="form-control" id="focusedInput" type="text" name="code" placeholder="Code" required/>
                    </div>
                </div>
                
                <div class="form-group has-feedback">
                    <div class="col-sm-3">
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

</html>