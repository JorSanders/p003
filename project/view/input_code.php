<?php include("../includes/sentry.php"); ?>
<html>

	<head>
		<?php include_once("../includes/head_bootstrap.html"); ?> 
	</head>

	<body>
		<?php include_once("../includes/navbar_bootstrap.php"); ?>
		<div class="container">		
			<div class="page-header">
				<h3>Aanwezig melden</h3>
			</div>
		
			<form class="form-horizontal" role="form" action="../controller/subjectcontroller.php" method="post">
				<div class="form-group">
					<label class="col-sm-0 control-label"></label>
					<div class="col-sm-6">	
						<span class="col-sm-12">Vul hieronder de benodigde gegevens in om jezelf aanwezig te melden.</span><br></br>
						<div class="form-group has-feedback">
							<label class="col-sm-6 control-label">Voer lescode in:</label>
							<div class="col-sm-6">
								<input class="form-control" id="focusedInput" type="number" placeholder="Bijvoorbeeld: 12345" name="code">
							</div>
						</div>
			
						<div class="form-group has-feedback">
							<label class="col-sm-6 control-label">Aanmelden met uw:</label>
							<div class="col-sm-6">
			
								<select name="search" class="form-control" id="focusedInput">
									<option value = "name">Naam</option>
									<option value = "email">E-mailadres</option>
									<option value = "code" selected>Code</option>
								</select>
							</div>
						</div>

						<div class="form-group has-feedback">
							<label class="col-sm-6 control-label">Typ uw bijbehorende gegeven bij de bovenstaande keuze in:</label>
							<div class="col-sm-6">
								<input type = "text" name = "name" class="form-control" value="<?php echo $_SESSION['code']; ?>" id="focusedInput" required>
							</div>
						</div>

			
						<input type="hidden" name="action" value="add_user_lesson">
						<div class="form-group has-feedback">
							<div class="col-sm-12">
								<input class="btn btn-default pull-right" type="submit" value="Aanwezig melden">
							</div>
						</div>
					
			</form>
			</div>
		</div>

			<?php
			if (isset($_SESSION['validCode'])){
				if($_SESSION['validCode']){
					echo "<span class=\"help-block pull-left\"> Je bent aangemeld bij de les: {$_SESSION['lesson_name']}</span>";
				}
				else{
					echo "<span class=\"help-block pull-left\"> De code {$_SESSION['code']} is incorrect, probeer opnieuw. <br>
					Denk eraan dat de code uit 5 cijfers bestaat.</span>";
				}
				unset($_SESSION['validCode']);
			}
			?>

					</div>
				</div>
		<footer>
			<?php include_once("../includes/footer_bootstrap.html"); ?> 
		</footer>
		<?php include_once("../includes/test_bootstrap.html"); ?> 
	</body>
</html>