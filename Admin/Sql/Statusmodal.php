<?php
include '../includes/config.php';
$id=$_REQUEST['id'];
/* if(!$id){
	header("location:view.php");
} */
$sql="Select * from agencyregister where Agy_id=$id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
?>