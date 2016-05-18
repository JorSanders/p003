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
		

		<div id="content">
		<div class="container">
		<br></br>
		<h2>Rol aan gebruiker toevoegen:</h2>
		<form class="form-horizontal" role="form" action="../controller/roleController.php" method="post">
	    		<div class="form-group">
	      			<label class="col-sm-2 control-label"></label>
	      			<div class="col-sm-6">
	      			<br><br>
        	
            
                    <input name="action" type="hidden" value="saveUserRole" />
                    <div class="form-group has-feedback">
                   		<label class="col-sm-4 control-label">Gebruiker:</label>
                   		<div class="col-sm-4">
					   
				<select name="userId" class="form-control" id="focusedInput">
				<?php
				require_once("../classes/model/userclass.php");
					if (isset($_SESSION['userList'])) {
					$userList = unserialize ($_SESSION['userList']);
					
					foreach ($userList as $user) {
						echo "<option value = ' ";
						echo $user->getId();
						echo " '>";
						echo $user->getName();
						echo "</option>";
						echo "<br>";
					}
					}
					?> 
				</select>
				</div>
				</div>
					
                   	<div class="form-group has-feedback">	
                   	 	<label class="col-sm-4 control-label">Rol:</label>
                   		<div class="col-sm-4">
				<select name="roleId" class="form-control" id="focusedInput">
					<?php
					require_once("../classes/model/roleClass.php");
					if (isset($_SESSION['roleList'])) {
					$roleList = unserialize ($_SESSION['roleList']);
					
					foreach ($roleList as $role) {
						echo "<option value = ' ";
						echo $role->getId();
						echo " '>";
						echo $role->getName();
						echo "</option>";
						echo "<br>";
					}
					}
					?> 
					</select>
					</div>
					</div>
             				
				<div class="form-group has-feedback">
                   	<label class="col-sm-4 control-label">Begin datum:</label>
                   	<div class="col-sm-4">
						<input class="form-control" id="focusedInput" type="date" name="start_date">
					</div>
				</div>

				<div class="form-group has-feedback">	
                   	<label class="col-sm-4 control-label">Eind datum:</label>
                   	<div class="col-sm-4">
						<input class="form-control" id="focusedInput" type="date" name="end_date">
					</div>
				</div>
                
                <div class="form-group has-feedback">
                	<div class="col-sm-8">
                		<button type="submit" class="btn btn-default pull-right">Rol toevoegen</button>
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