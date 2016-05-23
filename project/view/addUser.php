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
		   <h3>Gebruiker toevoegen</h3>
            </div>
			
			<form class="form-horizontal" role="form" action="../controller/usercontroller.php" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-0">

        
            
              

            
                    <input name="action" type="hidden" value="saveUser" />
                <br>
                <div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">Naam:</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="focusedInput" type="text" name="name" placeholder="Bert" required /><br>
                    </div>
                </div>
				<div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">Wachtwoord:</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="focusedInput" type="password" name="password"  placeholder="******" required/>
                    </div>
                </div>
				<div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">E-mail:</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="focusedInput" type="text" name="email"  placeholder="bert@windesheimflevoland.nl" required/>
                    </div>
                </div>
				<div class="form-group has-feedback">
                    <label class="col-sm-2 control-label">Identificatiecode:</label>
                    <div class="col-sm-3">
				        <input class="form-control" id="focusedInput" type="text" name="code" placeholder="S1091199" required/>
                    </div>
                </div>
                
                <div class="form-group has-feedback">
                    <div class="col-sm-5">
                <button type="submit" class="btn btn-default pull-right glyphicon glyphicon-plus">Toevoegen</button>
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