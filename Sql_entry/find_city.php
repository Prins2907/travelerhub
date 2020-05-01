<option>Select City</option>
<?php 
	include '../includes/config.php';

	if(isset($_POST["state1"]))
	{
		$id = $_POST["state1"];
		$sql="SELECT S_id from States where S_name = '$id'";
		$resultstateid = mysqli_query($conn,$sql);
		$ftchresult = mysqli_fetch_assoc($resultstateid);
		$stateid =$ftchresult["S_id"];
		//echo $id;

		$sel = "SELECT * from cities where S_id = '$stateid'";
		$res = mysqli_query($conn,$sel);

		while($row = mysqli_fetch_array($res))
		{
		?>
		<option <?php echo $row["Ct_id"]; ?>><?php echo $row["Ct_name"]; ?></option>
		<?php
		}
	}

?>