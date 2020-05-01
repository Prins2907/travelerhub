<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="travelershub";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id=$_REQUEST['id'];
/* if(!$id){
	header("location:view.php");
} */
$sql="Select * from userregister where U_id=$id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
?>