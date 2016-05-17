<?php 
include("menu.php");
?>
<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>


        <div id="content">
            <h3>Gebruiker is aan rol gekoppeld </h3>
              <br><br>

            <form method="post" action='../controller/roleController.php?action=findAllRole' >
                Klik hier om nog een gebruiker aan een rol te koppelen:<br>
				<input type="submit" name="Go">
            </form>
			
            <form method="post" action='../view/overview_combination.php' >
                Klik hier voor het overzicht:<br>
				<input type="submit" name="Go">
            </form>
        </div>

		
    </body>
</html>