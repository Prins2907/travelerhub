<?php
include 'includes/config.php';
$info = pathinfo($_FILES['file']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = $_FILES['file']['name']; 
$target = 'Proof/'.$newname;
move_uploaded_file( $_FILES['file']['tmp_name'], $target);
echo $newname;
?>