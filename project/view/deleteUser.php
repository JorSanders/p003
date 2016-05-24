<!DOCTYPE html>
<html>
    <head>
        <title> Introduction to Object-Oriented Programming </title>
        <?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>
	
    <body>
        <?php include_once("../includes/navbar_bootstrap.html"); ?>		
        

      
            <div class="container">
                <div class="page-header">
                <h3>Gebruiker verwijderen</h3>
                </div>
                <form class="form-inline" role="form" action="../controller/usercontroller.php" method="get">
                       <div class="form-group">
                           <div class="col-sm-12">
                               
                   
	                           <div class="form-group has-feedback">
                                   <div class="col-sm-0">
                                       <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                       <button class="btn btn-default submit pull-left" type="submit" name="action" value="JA">Ja</button>
                                   </div>
                                </div>
                                <div class="form-group has-feedback">
                                   <div class="col-sm-12">
                                       <button class="btn btn-default submit pull-right" type="submit" name="action" value="NEE">Nee</button>
                                   </div>
                               </div>
                               </div> 
                               <div class="form-group has-feedback">
                                   <div class="col-sm-12">
                                       <span class="help-block">Weet je zeker dat je deze gebruiker wil verwijderen?</span>
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