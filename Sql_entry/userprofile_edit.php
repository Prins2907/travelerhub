<?php
include('../includes/config.php');
if(isset($_POST['user_id'])){
	$U_id=$_POST['user_id'];
	$Email_id=$_POST['user_email'];
	$Mobile_no=$_POST['user_mobile'];
	$sql_update="UPDATE userregister SET Email_id = '$Email_id', Mobile_no = '$Mobile_no' WHERE U_id ='$U_id'";

}
if ($conn->query($sql_update) === TRUE) {
    echo "New record created successfully";
}

$conn->close();

?>