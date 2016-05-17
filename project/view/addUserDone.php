<?php 
include("menu.php");
?>
<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>


        <div id="content">
            <h3>De gebruiker is toegevoegd </h3>
              <br><br>

            <form method="post" action='../view/addUser.php' >
                Klik hier om nog een gebruiker toe te voegen:<br>
				<input type="submit" name="Go">
            </form>
			
            <form method="post" action='../view/overview_combination.php' >
                Klik hier voor het overzicht:<br>
				<input type="submit" name="Go">
            </form>
        </div>

		
    </body>
</html>