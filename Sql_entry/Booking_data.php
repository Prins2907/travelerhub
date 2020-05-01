<?php
include('../includes/config.php');
$id=$_REQUEST['id'];
/* if(!$id){
	header("location:view.php");
} */

$sql="SELECT PE.*,ES.* from package_enquiry PE JOIN enquiry_status ES ON PE.Pack_enquiry_id=ES.Pack_enquiry_id WHERE ES.Pack_enquiry_id = '$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$Type = $row['Type'];
$Date = $row['Departure_date'];

$Agy_id=$row['Agy_id'];
$P_id =$row['P_id'];
$Adults=$row['Adults'];
$Children=$row['Children'];
/*echo json_encode($row);*/
$Sql_package="SELECT * from Packages WHERE P_id =$P_id";
$result_package = mysqli_query($conn,$Sql_package);
$fetch_package = mysqli_fetch_assoc($result_package); 
$Price = $fetch_package[$Type];
$Package_name=$fetch_package['Package_name'];

/*Agency name*/
$Sql_name="SELECT Agency_name from agencyregister WHERE Agy_id =$Agy_id";
$result_name = mysqli_query($conn,$Sql_name);
$fetch_name = mysqli_fetch_assoc($result_name); 
$Agency_name = $fetch_name['Agency_name'];
$datapass = array('Agency_name' =>"$Agency_name",'Agy_id' => "$Agy_id",'P_id' => "$P_id",'Package_name' => "$Package_name", 'Price' => "$Price",'Adults' => "$Adults",'Children' => "$Children",'Type' =>"$Type",'Departure_date' =>"$Date");
echo json_encode($datapass);


?>