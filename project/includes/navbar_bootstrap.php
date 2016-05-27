	<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
<a href="index.php" class="pull-left"><img class="img-responsive" src="../includes/windesheimflevoland-logo.png"></a>
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		  
		</div>
	
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">

				<li><a href="index.php">Startpagina</a></li>

			
				<li>
					<a href="input_code.php" role="button">Aanwezig melden</a>
				</li>				
				<li>
					<a href="CodeGeneratorSelect.php" role="button">Lescode genereren</a>
				</li>
				
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Overzicht <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="AllUsersList.php">Gebruikers</a></li>
					<li><a href="AllSubjectsList.php">Modules</a></li>
					<li><a href="AllRolesList.php">Rollen</a></li>
					<li role="separator" class="divider"></li>
				</ul>
				</li>
					
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Toevoegen <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="addUser.php">Gebruiker</a></li>
						<li><a href="overview_subjects.php">Module</a></li>
						<li><a href="AddRole.php">Rol</a></li>
						<li><a href="overview_lessons_select.php">Les</a></li>
						<li role="separator" class="divider"></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Importeer CSV <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="../view/CSVUploadUser.php">Gebruiker CSV uploaden</a></li>
						<li><a href="../view/CSVUploadSubject.php">Modulen CSV uploaden</a></li>
						<li><a href="../view/CSVUploadRole.php">Rol CSV uploaden</a></li>
						<li role="separator" class="divider"></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Koppel <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="addUserLesson.php">Gebruiker aan les koppelen</a></li>
						<li><a href="../controller/roleController.php?action=findAllRole">Gebruiker aan rol koppelen</a></li>
						<li role="separator" class="divider"></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle pull-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="../controller/usercontroller.php?action=findOneUser&id=<?php echo $_SESSION['id']; ?>">Profiel</a></li>
						<li><a href="changePassword.php">Wachtwoord wijzigen</a></li>
						<li><a href="logout.php">Uitloggen</a></li>
						<li role="separator" class="divider"></li>
					</ul>
				</li>




			</ul>


		</div><!--/.nav-collapse -->
		
	</div>
</nav>

