<?php
include('includes/config.php');
$email = $_POST['Email_id'];
$Sql="SELECT * From userregister where Email_id='$email'";
$res = mysqli_query($conn, $Sql);
$count = mysqli_num_rows($res);
if($count == 1){
	$r = mysqli_fetch_assoc($res);
$password = $r['Password'];
$to = $r['Email_id'];
$subject = "Your Recovered Password";

$message = "Please use this password to login " . $password;
$headers = "From : pinspatel737@gmail.com";
if(mail($to, $subject, $message, $headers)){
	echo "Your Password has been sent to your email id";
}else{
	echo "Failed to Recover your password, try again";
}
	}else{
		echo "User name does not exist in database";
	}
?>