<!doctype html>

<html>

<head>
    <title>Upload page</title>
    <?php include_once("../includes/head_bootstrap.html"); ?>
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h3>Rol CSV uploaden</h3>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <?php include_once("../includes/navbar_bootstrap.php"); ?> 
 
<?php
 
include "CSVConnection.php"; //Connect to Database
 
$deleterecords = "TRUNCATE TABLE user"; //empty the table of its current records
mysql_query($deleterecords);
 
//Upload File
if (isset($_POST['submit'])) {
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<div>" . "File ". $_FILES['filename']['name'] ." Met succes geupload." . "</div><br>";
        echo "<span>Toegevoegde Rollen:</span>";
        
    }
 
    //Import uploaded file to Database
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    echo "<Table class='table table-striped'> <tr><th>Rol</th><th>E-mail</th><th>Identificatiecode</th><th>Actief</th></tr>";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into user(id,name,password,email, code,active) values('NULL','$data[1]','".md5($data[2])."','$data[3]','$data[4]','$data[5]')";
        echo "<tr><td>$data[1]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td></tr>";
        mysql_query($import) or die(mysql_error());
    }
    echo "</table>";

    fclose($handle);
 
    
 
    //view upload form
}else {
 
    print "Kies een lokaal .CSV bestand en klik op \"Upload\"<br></br>";
 
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
