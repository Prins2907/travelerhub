<?php 
include('../includes/config.php');
	if(isset($_POST["Standard_i"]))
	{
		$Agy_id=$_POST['Agent_id'];
		$P_id=$_POST['Package_id'];
		$S_inclu=$_POST['Standard_i'];
		$S_exclu=$_POST['Standard_e'];
		$D_inclu=$_POST['Deluxe_i'];
		$D_exclu=$_POST['Deluxe_e'];
		$P_inclu=$_POST['Premium_i'];
		$P_exclu=$_POST['Premium_e'];
		//echo $S_inclu;
		$sql="INSERT into `Package_features`(Agy_id,P_id,
		Standard_inclusion,Standard_exclusion,
		Deluxe_inclusion,Deluxe_exclusion,
		Premium_inclusion,Premium_exclusion) Values
		('$Agy_id','$P_id',
		'$S_inclu','$S_exclu',
		'$D_inclu','$D_exclu',
		'$P_inclu','$P_exclu')";
		//echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Features Added Successfully";
}
$conn->close();
	}
?>