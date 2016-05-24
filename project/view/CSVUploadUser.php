<!doctype html>

<html>

<head>
    <title>Gebruiker CSV uploaden</title>
    <?php include_once("../includes/head_bootstrap.html"); ?>
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h3>Gebruiker CSV uploaden</h3>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <?php include_once("../includes/navbar_bootstrap.php"); ?> 
 
<?php
 
include "CSVConnection.php"; //Connect to Database
 
$deleterecords = "TRUNCATE TABLE user"; //empty the table of its current records
mysql_query($deleterecords);

//CSV filetypes array to check upload (Kevin)
$csv_mimetypes = array(
    'text/csv',
    'text/plain',
    'application/csv',
    'text/comma-separated-values',
    'application/excel',
    'application/vnd.ms-excel',
    'application/vnd.msexcel',
    'text/anytext',
    'application/octet-stream',
    'application/txt',
);

//Upload File
if (isset($_POST['submit'])&&(in_array($_FILES["filename"]["type"], $csv_mimetypes))) {
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "Het bestand ". $_FILES['filename']['name'] ." is met succes geüpload.<br><br>";
        echo "Toegevoegde Gebruiker(s):";
    }
 
    //Import uploaded file to Database
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    echo "<Table class='table table-striped'> <tr><th>Naam</th><th>E-Mail</th><th>Identificatiecode</th><th>Actief</th></tr>";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into user(id,name,password,email,code,active) values('NULL','$data[1]','".md5($data[2])."','$data[3]','$data[4]','$data[5]')";
        echo "<tr><td>$data[1]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td></tr>";
        mysql_query($import) or die(mysql_error());
    }
    echo "</table>";
	 
    fclose($handle);
 
    //view upload form
}else {
 
    print "Kies een lokaal .CSV bestand en klik op \"Upload\".<br><br>";
    print "<form enctype='multipart/form-data' action='CSVUploadUser.php' method='post'>";
    print "<input size='50' type='file' name='filename'><br>";
    print "<input type='submit' name='submit' value='Upload'></form>";

 
}
 
?>
 
</div>
</div>
</div>

<footer>
    <?php include_once("../includes/footer_bootstrap.html"); ?> 
</footer>
<?php include_once("../includes/test_bootstrap.html"); ?> 
</body>
</html>
