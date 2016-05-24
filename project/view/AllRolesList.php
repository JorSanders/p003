<html>
    <head>
        <?php   session_start();
		$_SESSION['userName']="Kevin";
		require_once("../includes/head_bootstrap.html"); 
		if (!isset($_SESSION['AllRolesList'])) {
			header('Location: ../controller/roleController.php?action=findAllRoles');
		}		
		?> 
    </head>
	
    <body>
        <?php include_once("../includes/navbar_bootstrap.php"); ?>
        <?php
		
        require_once("../classes/model/roleClass.php");
        $AllRolesList = unserialize($_SESSION['AllRolesList']);
		unset ($_SESSION['AllRolesList']);
        ?>
		
        <div class="container">
            <div class="page-header">
                <h3>Rollenoverzicht</h3>
            </div>
			<div class="col-sm-8">
                <table class='table table-striped'> 
					<tr><th>Rol</th><th>Actief</th></tr>
					<?php
					foreach ($AllRolesList as $Role) {
						echo "<tr><td><a href='../controller/roleController.php?action=findOneRole&id=".$Role->getId()."'>".$Role->getName() . "</a></td>";
						echo "<td>".$Role->getActive() . "</td></tr>";
                    }    
					?>
				</table>
				<a class="btn btn-default" href="../view/CSV/RolesCSV.php" role="button">CSV bestand exporteren</a>
			</div> 
		</div>

		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 

    </body>
</html>