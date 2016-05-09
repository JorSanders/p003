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


				<input type="submit" name="submit">
            </form>
        </div>
<<<<<<< HEAD:project/view/new_user_form.php
<<<<<<< HEAD


=======
		<?php
		include("menu.php");
		?>
>>>>>>> origin/master
=======


>>>>>>> c9102fc2a31b5dd015680d81646103e6798b4de8:project/view/addUser.php
    </body>
</html>