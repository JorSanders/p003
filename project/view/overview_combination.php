<?php session_start(); ?>
<form action="../controller/subjectcontroller.php" method="POST">

	zoek naar<br>
	<select  name="tableGoal">
	  <option value="lesson" <?php if($_GET["tableGoal"] == "lesson"){echo "selected";} ?>>les</option>
	  <option value="user" <?php if($_GET["tableGoal"] == "user"){echo "selected";} ?>>gebruiker</option>
	  <option value="role" <?php if($_GET["tableGoal"] == "role"){echo "selected";} ?>>rol</option>
	</select><br><br>
	
	zoek in<br>
	<select name="tableOrigin">
	  <option value="lesson" <?php if($_GET["tableOrigin"] == "lesson"){echo "selected";} ?>>les</option>
	  <option value="user" <?php if($_GET["tableOrigin"] == "user"){echo "selected";} ?>>gebruiker</option>
	  <option value="role" <?php if($_GET["tableOrigin"] == "role"){echo "selected";} ?>>rol</option>
	</select><br><br>


	Voer de kolom in waarin je zoekt<br>
	<input type="text" placeholder="Waarde" name="column" value=<?php echo $_GET["column"] ?>> </input>	<br><br>

	waarde<br>
	<input type="text" placeholder="Waarde" name="value" value=<?php echo $_GET["value"] ?>> </input>	<br><br>
	
	<input type="hidden" name="action" value="find_combinations">
	
	<input type="submit" value="zoeken">


</form> 

<?php

if (isset($_SESSION['result'])){
	$resultArray = unserialize ($_SESSION['result']);
	echo "<br><br>";
	
	echo "<table  border='1' border-width: 1px;' > \n";
	
	foreach($resultArray as $item){
		echo "<tr>";
			while (current($item)) {
					echo "<td>";
					$keyList[] = key($item);
					echo key($item);
					echo "</td>";
				next($item);
			}
		break;
	}foreach($resultArray as $item){
		echo "</tr>\n";
			
			echo "<tr>";
			
			foreach($keyList as $key){
				echo "<td>";
				echo $item[$key]; 
				echo "</td>";
			}
			echo "</tr>\n";
			

	}
	echo "</table>";

}
?>