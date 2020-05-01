
<html>
<head>

</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="form1";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$query="DELETE FROM form1 WHERE id=".$_GET['id'];
$result = $conn->query($query);

echo $query;
header('Location: view.php');

?>
	
</body>
 </html>