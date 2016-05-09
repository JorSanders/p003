<html>

<head>
	<title>User List</title>
</head>

	<body>
	
	<?php

		if (isset($_SESSION['UserList1'])) {
			$UserList1 = unserialize ($_SESSION['UserList1']);

			foreach ($UserList1 as $List1) {
						
						echo $List1->getId();
						
						echo $List1->getName();
						
					}
				}

	?>

	</body>








</html>