<!DOCTYPE html>
<html>
    <head>
        <title> Introduction to Object-Oriented Programming </title>
            </head>
	
    <body>
        		
        <div id="content">
            <form action="../controller/usercontroller.php" method="GET">
	     
                <h2>User</h2>
                <br><br>
          
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
				
				Weet je zeker dat je deze gebruiker wil verwijderen?
                <button class="submit" type="submit" name="action" value="JA">Ja</button>
                <button class="submit" type="submit" name="action" value="NEE">Nee</button>
            </form>
                   
        </div> 

		<?php
		include("menu.php");
		?>
		
    </body>
</html>