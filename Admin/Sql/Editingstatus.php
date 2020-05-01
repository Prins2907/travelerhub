<?php 
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelershub";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id=$_POST["id"];
$Name=$_POST["Agencyname"];
//echo "<script type='text/javascript'>alert('$Name');</script>";

$Status = $_POST["Status"];
$sql= "Update agencyregister
SET Status = '$Status'
Where Agy_id = $id";

if($Status == "Approved"){
		$DirAgency="../../Agency/List/".$Name;
		//echo "<script type='text/javascript'>alert('$DirAgency');</script>";

		if (!file_exists($DirAgency) && !is_dir($DirAgency)) {
		    mkdir($DirAgency);         
		} 
}


$success="Updated successfully";
$Eror = '"Error: " . $sql . "<br>" . $conn->error';
if ($conn->query($sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>