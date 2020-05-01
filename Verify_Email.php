<?php

include('connect.php');
	
	
	if(isset($_GET['e']))
	{
		
		$Confirmation_Token=$_GET['e'];
		
		$display=mysqli_query($conn,"select * from `temp_master` where `Confirmation_Token`='".$Confirmation_Token."'");
		
		if(mysqli_num_rows($display)==1)
		{
			
			$isemail_verify='1';
			
			$update=mysqli_query($conn,"update `temp_master` set `Confirmation_Token`='',
														`Isemail_Verify`='".$isemail_verify."'
														where `Confirmation_Token`='".$Confirmation_Token."'");
							if($update)
							{
								header('location:index.php');
							}
		}
		else
		{
			
		}
	}
	

	
	
	
	
?>