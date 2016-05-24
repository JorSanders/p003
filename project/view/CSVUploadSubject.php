<!doctype html>

<html>

<head>
    <title>Upload page</title>
    <?php include_once("../includes/head_bootstrap.html"); ?>
</head>
<body>

    <div class="container">
        <div class="page-header">
            <h3>Module CSV uploaden</h3>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <?php include_once("../includes/navbar_bootstrap.php"); ?> 
 
<?php
 
include "CSVConnection.php"; //Connect to Database
 
$deleterecords = "TRUNCATE TABLE subject"; //empty the table of its current records
mysql_query($deleterecords);
 
//Upload File
if (isset($_POST['submit'])) {
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<div class=\"lead\">" . "File ". $_FILES['filename']['name'] ." Met succes geupload." . "</div>";
        echo "<span class=\"lead\">Toegevoegde Modules:</span>";
        
    }
 
    //Import uploaded file to Database
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    echo "<Table class='table table-striped'> <tr><th>Vak</th><th>Actief</th></tr>";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into subject(subject_id,subject_name,owner_id,active) values('NULL','$data[1]','$data[2]','$data[3]')";
        echo "<tr><td>$data[1]</td><td>$data[3]</td></tr>";
        mysql_query($import) or die(mysql_error());
    }
    echo "</table>";

    fclose($handle);
 
    
 
    //view upload form
}else {
 
    print "Kies een lokaal .CSV bestand en klik op \"Upload\"<br><br>";
 
    print "<form enctype='multipart/form-data' action='CSVUploadSubject.php' method='post'>";
 
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
