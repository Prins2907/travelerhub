<?php include('../includes/config.php');?>

<?php
$id=$_POST['Enquiry_id'];
$sql_user_id="SELECT U_id from `package_enquiry` where Pack_enquiry_id ='$id'";
$result_user_id = mysqli_query($conn,$sql_user_id);
$fetch_user_id = mysqli_fetch_assoc($result_user_id); 
$U_id = $fetch_user_id["U_id"];
$Comment = $_POST['Commentdata'];
$sql="INSERT into `enquiry_status`(Pack_enquiry_id,U_id,Comment,Status) VALUES('$id',$U_id,'$Comment','Approve')";
if($conn->query($sql) === true){
	echo "Approve Enquiry";
}
else{
	echo"Failed To Approve";
}
$conn->close();
?>