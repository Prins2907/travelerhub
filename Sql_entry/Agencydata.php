<?php 
include('../Includes/config.php');
//$info = pathinfo($_FILES['pic']['name']);
//$ext = $info['extension']; // get the extension of the file
//$newname = $_FILES['pic']['name']; 
//$target = 'uploads/'.$newname;
//move_uploaded_file( $_FILES['pic']['tmp_name'], $target);

$Agencyname = $_POST["agencyname"];
$Email_id = $_POST["email_id"];
$Username = $_POST["username"];
$Password = $_POST["password"];
$Contact_no = $_POST["c_no"];
$State =$_POST["state"];
$City= $_POST["agencycity"]; 
$Document= $_POST["hidden"];
$Logo= $_POST["hidden1"]; 
$Address= $_POST["address"];

 $sql = "INSERT INTO agencyregister (Agency_name,Email_id,Username,Password,Contact_no,State,City,Document,Logo,Address)
 VALUES('$Agencyname','$Email_id','$Username','$Password','$Contact_no','$State','$City','$Document','$Logo','$Address')";

 
if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 ?>