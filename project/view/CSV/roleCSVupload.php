<html>
<head>
<title>Upload page</title>

</head>
<body>
<div>
<div>
 
<?php
 
include "connection.php"; //Connect to Database
 
$deleterecords = "TRUNCATE TABLE role"; //empty the table of its current records
mysql_query($deleterecords);
 
//Upload File
if (isset($_POST['submit'])) {
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
        echo "<h2>Displaying contents:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }
 
    //Import uploaded file to Database
    $handle = fopen($_FILES['filename']['tmp_name'], "r");
 
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import="INSERT into role(id,name,active) values('NULL','$data[1]','$data[2]')";

        mysql_query($import) or die(mysql_error());
    }
 
    fclose($handle);
 
    print "Import done";
 
    //view upload form
}else {
 
    print "Upload new csv by browsing to file and clicking on Upload<br />\n";
 
    print "<form enctype='multipart/form-data' action='roleCSVupload.php' method='post'>";
 
    print "File name to import:<br />\n";
 
    print "<input size='50' type='file' name='filename'><br />\n";
 
    print "<input type='submit' name='submit' value='Upload'></form>";
 
}
 
?>
 
</div>
</div>
</body>
</html>
