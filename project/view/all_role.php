<?php
require_once("../classes/model/roleClass.php");
					if (isset($_SESSION['roleList'])) {
					$roleList = unserialize ($_SESSION['roleList']);
					
					foreach ($roleList as $role) {

						echo $role->getId();
						echo "<br>";
						echo $role->getName();
						echo "<br>";
						echo $role->getActive();
						echo "<br>";
						echo "<br>";
					}
					}
					?> 