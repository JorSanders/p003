<!DOCTYPE html>
<html>
    <head>
        <?php include_once("../includes/head_bootstrap.html"); ?> 
    </head>

    <body>
            
        <div class="container">
            <div class="page-header">
                <h3>De gebruiker is toegevoegd</h3>
            </div>
            <div class="form-group">
                    <div class="col-sm-10">
                <?php include_once("../includes/navbar_bootstrap.html"); ?> 

            <form method="post" class="form-horizontal" role="form" action='../view/addUser.php' >
               
                <div class="form-group has-feedback">
                    <div class="col-sm-2">
                        <input class="btn btn-default pull-right" name="submit" type="submit" value="Gebruiker toevoegen">
                    </div>
                </div>
		
            </form>
			
            <form method="post" class="form-horizontal" role="form" action='../view/overview_combination.php' >
                
                <div class="form-group has-feedback">
                    <div class="col-sm-2">
                        <input class="btn btn-default pull-right" name="submit" type="submit" value="Overzicht Gebruikers">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
		
    </body>
</html>