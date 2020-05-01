<?php 
include('../includes/config.php');

	if(isset($_POST["package_id"]))
	{
		$id = $_POST["package_id"];
		$sql_agency_id ="SELECT `Agy_id` FROM Packages Where P_id='$id'";
		$result_agency_id = mysqli_query($conn,$sql_agency_id);
		$fetch_agency_id = mysqli_fetch_assoc($result_agency_id); 
		$Agy_id = $fetch_agency_id["Agy_id"];
        $sql_images = "SELECT `Image_info` FROM `Gallery_data` WHERE P_id ='$id'";
		$result_images = mysqli_query($conn,$sql_images);
		$row_images = mysqli_fetch_row($result_images);
		$source = explode("|", $row_images[0]);
		for($i = 0; $i < count($source); $i++){
                echo "<img height='250px' class='w3-border w3-padding' width='250px' src='Gallery/$Agy_id/$id/$source[$i]'/>";
              } 
	}

?>