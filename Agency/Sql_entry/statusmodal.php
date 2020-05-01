<?php
include '../includes/config.php';
$id=$_REQUEST['id'];
/* if(!$id){
	header("location:view.php");
} */
$sql="Select * from packages where P_id='$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
?>