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
 
$deleterecords = "TRUNCATE TABLE role"; //empty the table of its current records
mysql_query($deleterecords);
 
//Upload File
if (isset($_POST['submit'])) {
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<div class=\"lead\">" . "File ". $_FILES['filename']['name'] ." Met succes geupload." . "</div>";
        echo "<span class=\"lead\">Toegevoegde Rollen:</span>";
        
    }
 
    //Import uploaded file to Database
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
    echo "<Table class='table table-striped'> <tr><th>Rol</th><th>Actief</th></tr>";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into role(id,name,active) values('NULL','$data[1]','$data[2]')";
        echo "<tr><td>$data[1]</td><td>$data[2]</td></tr>";
        mysql_query($import) or die(mysql_error());
    }
    echo "</table>";

    fclose($handle);
 
    
 
    //view upload form
}else {
    echo"
 
    <div class='form-group'>
        <div class='col-sm-10'>
            <form enctype='multipart/form-data' action='CSVUploadRole.php' method='post' class='form-horizontal' role='form'>
                <div class='form-group'>
                    <label class='col-sm-3 control-label'>Bestand naam:</label>
                        <div class='col-sm-6'>
                            <div class='form-group has-feedback'>
                                <input type='file' name='filename' class='form-control' id='focusedInput'>
                            </div>
                        </div>
                <div class='form-group has-feedback'>
                    <div class='col-sm-9'>
                        <button class='btn btn-default pull-right' name='submit' type='submit'>Uploaden</button>
                    </div>
                </div>
            </form>
        </div>
    </div>";
 
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
