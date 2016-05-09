<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>



        <div id="content">
            <h3>Nieuwe gebruiker: </h3>
              <br><br>

            <form method="post" action='../controller/usercontroller.php' >
                    <input name="action" type="hidden" value="saveUser" />
                Naam:<br>
				<input type="text" name="name" placeholder="naam" required/><br/>
				<br>wachtwoord:<br/>
                <input type="password" name="password"  placeholder="wachtwoord" required/><br/>
				<br>email:<br/>
                <input type="text" name="email"  placeholder="emailadres" required/><br/>
				<br>Code:<br/>
				<input type="text" name="code" placeholder="Code" required/><br/><br>
				<br>Rol:<br/>
				<select name="role">
					<?php
					require_once("../classes/model/roleClass.php");
					if (isset($_SESSION['roleList'])) {
					$roleList = unserialize ($_SESSION['roleList']);
					
					foreach ($roleList as $role) {
						echo "<option value = ' ";
						echo $role->getName();
						echo " '>";
						echo $role->getName();
						echo "</option>";
						echo "<br>";
					}
					}
					?> 
				<br><br>
				<br>Begin datum<br>
				<input type="date" name="start_date"><br></br>
				<br>Eind datum<br>
				<input type="date" name="end_date"><br></br>

				<input type="submit" name="submit">
            </form>
        </div>
<<<<<<< HEAD


=======
		<?php
		include("menu.php");
		?>
>>>>>>> origin/master
    </body>
</html>