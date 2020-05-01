<?php
include 'includes/config.php';
$U_id =$_POST['user_id'];
$info = pathinfo($_FILES['file']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = $_FILES['file']['name']; 
$target = 'User/'.$newname;
move_uploaded_file( $_FILES['file']['tmp_name'], $target);

$sql_image="UPDATE userregister SET User_image = '$newname' Where U_id ='$U_id' ";
if ($conn->query($sql_image) === TRUE) {
    echo "Updated";
}
//echo $sql_image;
?>