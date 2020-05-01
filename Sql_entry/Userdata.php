<?php 
include '../includes/config.php';

$Fullname = $_POST["fname"];
$DOB = $_POST["dob"];
$Gender = $_POST["gender"];
$Email_id = $_POST["email"];
$Password = $_POST["userpassword"];
$Mobile_no = $_POST["m_no"];
$City= $_POST["city"]; 


 $sql = "INSERT INTO userregister (Full_name,DOB,Gender,
 Email_id,Password,Mobile_no,City)
 VALUES
 ('$Fullname','$DOB','$Gender',
 '$Email_id','$Password','$Mobile_no','$City')";

 
if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully<br>";
    header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 ?>