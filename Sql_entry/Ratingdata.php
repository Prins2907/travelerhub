<?php 
include('../Includes/config.php');
$Agency_id = $_POST["Agy_id"];
$User_id = $_POST['User_id'];
$Email_id = $_POST["Email_id"];
$Visited = $_POST['Visited'];
$Star_rated=$_POST['star'];
$Comment = $_POST['Comment'];
 $sql = "INSERT INTO Rating(Agy_id,U_id,Email_id,
 Visited,Star_rated,Comment) 
 Values('$Agency_id','$User_id','$Email_id',
 '$Visited','$Star_rated','$Comment')";
//echo $sql;
 
if ($conn->query($sql) === TRUE) {
    echo "Inserted Successfully";
}
$conn->close();

 ?>