<?php
include('../includes/config.php');
$id=$_REQUEST['id'];
$sql_update = "UPDATE booking_status where Txn_id='$id'";
echo $sql_update;
/*if($conn->query($sql_update) === TRUE) {
    echo "Booking Cancelled";
} */
?>