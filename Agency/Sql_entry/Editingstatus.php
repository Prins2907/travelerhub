<?php 
include('../includes/config.php');

$id=$_POST["id"];
$Name=$_POST["Package_name"];
//echo "<script type='text/javascript'>alert('$Name');</script>";

$Status = $_POST["Status"];
$sql= "Update packages
SET Status = '$Status'
Where P_id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>