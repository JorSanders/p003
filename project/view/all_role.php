<!doctype html>
<html>

<head>
<?php include_once("../includes/head_bootstrap.html"); ?> 
</head>

<body>
<?php include_once("../includes/navbar_bootstrap.html"); ?>
		
<?php
require_once("../classes/model/roleClass.php");
					if (isset($_SESSION['roleList'])) {
					$roleList = unserialize ($_SESSION['roleList']);
					?>
					 
                		<div id="content">
                		   <div class="container">
                		       <h2>Gebruikers lijst </h2>
                		               <div class="col-sm-8">
              <br><br>

                <table class='table table-striped'> 
					<?php
					
					foreach ($roleList as $role) {

						echo "<tr><td>".$role->getId() . "</td>";
						echo "<br>";
						echo "<td>".$role->getName(). "</td>";
						echo "<br>";
						echo "<td>".$role->getActive(). "</td></tr>";
						echo "<br>";
						echo "<br>";
					}
					}
					?> 
				</table>
			</div>
		</div>
	</div>
  	
  	<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
    </footer>
	<?php include_once("../includes/test_bootstrap.html"); ?> 
</body>

</html>