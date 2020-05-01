<?php 
include('../includes/config.php');

$P_id= $_POST["P_id"];
$sql_agency_id="SELECT Agy_id from packages where P_id ='$P_id'";
$result_agency_id = mysqli_query($conn,$sql_agency_id);
$fetch_agency_id = mysqli_fetch_assoc($result_agency_id); 
$Agy_id = $fetch_agency_id["Agy_id"];
$U_id=$_POST['User_enquiry_id'];
$Fullname = $_POST["Name"];
$Email_id = $_POST["Email_id"];
$Contact_no = $_POST["Mobile_no"];
$Type =$_POST["Type"]; 
$Departure_date= $_POST["Departure_date"];
$Adults= $_POST["Adults"];
$Children= $_POST["Children"];
$Comment= $_POST["Comment"];

 $sql = "INSERT INTO `package_enquiry`(P_id,Agy_id,U_id,
 Fullname,Email_id,
 Mobile_no,Type,Departure_date,
 Adults,Children,Comment)
 VALUES('$P_id','$Agy_id','$U_id',
 '$Fullname','$Email_id',
 '$Contact_no','$Type','$Departure_date',
 '$Adults','$Children','$Comment')";

 
if ($conn->query($sql) == TRUE) {
    echo "New record created successfully";
}
$conn->close();

 ?>