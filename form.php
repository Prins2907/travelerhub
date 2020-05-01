<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	echo "Successfully Connected to the database<br>";
}
 

/*$info = pathinfo($_FILES['picture']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = $_FILES['picture']['name']; 

$target = 'uploads/'.$newname;
move_uploaded_file( $_FILES['picture']['tmp_name'], $target); */
 
 
$name=$_POST["name"];
$lname=$_POST ["Lname"];
$DOB=$_POST["DOB"];
$Gender=$_POST["Gender"];
$marital=$_POST["marital"];
$country=$_POST["country"];
$adress1=$_POST["adress1"];
$adress2=$_POST["adress2"];
$postcode=$_POST["postcode"];
$Mono=$_POST["Mono"];
$Telephone=$_POST["Telephone"];
$mail=$_POST["mail"];
$Degree=json_encode( $_POST["Degree"]);
$picture=$_POST["hidden"]; 


$sql= "INSERT INTO form1(name,Lname,DOB,
Gender,marital,country,
adress1,adress2,postcode,
Mono,Telephone,email,
Degree,picture)
VALUES('$name','$lname','$DOB',
'$Gender','$marital','$country',
'$adress1','$adress2','$postcode',
'$Mono','$Telephone','$mail',
'$Degree','$picture')";







 
if($conn->query($sql) === TRUE) {
    echo "Table form created successfully";
	

}
else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>


