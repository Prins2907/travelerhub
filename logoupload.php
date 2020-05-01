<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelershub";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$info = pathinfo($_FILES['file']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = $_FILES['file']['name']; 
$target = 'Logo/'.$newname;
move_uploaded_file( $_FILES['file']['tmp_name'], $target);
echo $newname;
?>