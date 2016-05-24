<?php session_start(); ?>
<!doctype html>

<html>

<head>
    <title>Uitgelogd</title>
    <?php include_once("../includes/head_bootstrap.html"); ?>
</head>
<body>
	<?php include_once("../includes/navbar_bootstrap.php"); ?>
    <div class="container">
        <div class="page-header">
            <h3>Uitgelogd</h3>
        </div>
        <div class="form-group">
            <div class="col-sm-10">

				<?php session_destroy(); ?>
				<span>U bent uitgelogd, u kunt <a href="../view/login.php">hier</a> weer terug inloggen. </span>
			</div>
		</div>
	</div>

<footer>
	<?php include_once("../includes/footer_bootstrap.html"); ?> 
</footer>
<?php include_once("../includes/test_bootstrap.html"); ?> 
</body>

</html>