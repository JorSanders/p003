<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>



        <div id="content">
            <h3>Rol aan gebruiker toevoegen: </h3>
              <br><br>

            <form method="post" action='../controller/roleController.php' >
                    <input name="action" type="hidden" value="saveUserRole" />

					   Gebruiker:<br>
				<select name="userId">
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
				<br>
					
					
					
				<br>Rol:<br/>
				<select name="roleId">
					<?php
					require_once("../classes/model/roleClass.php");
					if (isset($_SESSION['roleList'])) {
					$roleList = unserialize ($_SESSION['roleList']);
					
					foreach ($roleList as $role) {
						echo "<option value = ' ";
						echo $role->getId();
						echo " '>";
						echo $role->getRole();
						echo "</option>";
						echo "<br>";
					}
					}
					?> 
					</select>
				<br>
             				
				
				<br>
				<br>Begin datum<br>
				<input type="date" name="start_date"><br></br>
				<br>Eind datum<br>
				<input type="date" name="end_date"><br></br>

				<input type="submit" name="submit">
            </form>
        </div>

		<?phpinclude("menu.php");?>
    </body>
</html>