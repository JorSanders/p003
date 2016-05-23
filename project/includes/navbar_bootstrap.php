
	
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
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Overzicht <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="AllUsersList.php">Gebruikersoverzicht</a></li>
							<li><a href="AllSubjectsList.php">Module overzicht</a></li>
							<li><a href="AllRolesList.php">Rollenoverzicht</a></li>
							<li><a href="#">Lesoverzicht*</a></li>
							<li role="separator" class="divider"></li>
						</ul>
						</li>
							
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Creëer <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="addUser.php">Gebruiker toevoegen</a></li>
								<li><a href="overview_subjects.php">Module toevoegen</a></li>
								<li><a href="overview_lessons_select.php">Les toevoegen</a></li>
								<li><a href="addRole.php">Rol toevoegen</a></li>
								<li role="separator" class="divider"></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Importeer CSV <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="/CSV/userCSVupload.php">Gebruiker CSV uploaden</a></li>
								<li><a href="/CSV/roleCSVupload.php">Rol CSV uploaden</a></li>
								<li><a href="/CSV/subjectCSVupload.php">Modulen CSV uploaden</a></li>
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

						<li>
							<a href="CodeGeneratorSelect.php" role="button">Lescode genereren</a>
						</li>

						<li>
							<a href="input_code.php" role="button">Aanwezig melden</a>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle pull-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">kevin <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="../controller/usercontroller.php?action=findOneUser&id=5">Profiel</a></li>
								<li><a href="changePassword.php">Wachtwoord wijzigen</a></li>
								<li><a href="logout.php">Uitloggen</a></li>
								<li role="separator" class="divider"></li>
							</ul>
						</li>




					</ul>


				</div><!--/.nav-collapse -->
				
			</div>
		</nav>
	
