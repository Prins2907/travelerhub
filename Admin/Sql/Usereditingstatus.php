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

$id=$_POST["id"];
$Status = $_POST["Status"];
$sql= "Update userregister
SET Status = '$Status'
Where U_id = $id";


$success="Updated successfully";
$Eror = '"Error: " . $sql . "<br>" . $conn->error';
if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>