<?php 
session_start();
  if(strlen($_SESSION['name'])==0)
  { 
    header('location:index.php');
  } 
?>
<?php include('includes/config.php');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Manage Agency </title>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Manage Agencies</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Agencies</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
			<div class="w3-responsive">
	  
					  <h2>Manage Agencies</h2>
					    <table class="w3-table-all w3-small" id="table">
						<thead>
					<tr class="w3-pink">
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>User Name</th>
						<th>Contact No</th>
						<th>City</th>
						<th>Address</th>
						<th>Proof</th>
						<th>Status</th>
						<th>Status Action</th>	
   					</tr>
						</thead>
						<tbody>
									<?php
									$count=1;
									$sql = "SELECT * FROM agencyregister";
									$result = $conn->query($sql);	
									if ($result->num_rows > 0){
										// output data of each row
									 while($row = $result->fetch_assoc()) { ?>
									<tr><td align="center"><?php echo $count; ?></td>
									<td align="center">
									<?php echo $row["Agency_name"]; ?>
									</td>
									<td align="center">
									<?php echo $row["Email_id"]; ?>
									</td>
									<td align="center">
									<?php echo $row["Username"]; ?>
									</td>
									<td align="center">
									<?php echo $row["Contact_no"]; ?>
									</td>
									<td align="center">
									<?php $city_id= $row["Ct_id"]; 
											$sql_city = "SELECT Ct_name FROM Cities Where Ct_id='$city_id'";
											$result_city = $conn->query($sql_city);
											$fetch_city_name = mysqli_fetch_assoc($result_city); 
                    						$cityname = $fetch_city_name["Ct_name"];
                    						echo $cityname;
									?>
									</td>
									<td align="center">
									<?php echo $row["Address"]; ?>
									</td>
									<td align="center">
									<?php $docname = $row["Document"]; 
									$pathinfo ="../Proof/";
									$info = $pathinfo.$docname;
									?>
									<img src="<?php echo $info ?>" style="width:100px; height:100px;">
									</td>
									<td align="center">
									<?php echo $row["Status"]; ?>
									</td>
									<td align="center">
									<a href="javascript:void(0)"  data-toggle="modal" data-target="#Statusmodal"  onclick="edit_id(<?php echo $row["Agy_id"];?>)">Edit </a>
									</td>
									</tr>
									<?php $count++; }
									}
									?>
						</tbody>
					  </table>
					</div>
					<Section>
						<div class="modal fade" id="Statusmodal" role="dialog">
							<div class="modal-dialog">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								<h4 class="modal-title">Status Change</h4>
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  
								</div>
								<div class="modal-body">
										<form name="statusform" id="statusform" method="post" align="left" enctype='multipart/form-data' > <!--  onsubmit="return validateForm()" --> 
										<fieldset>	
										<strong>
										<br>
											<table>
												<tr>
												<td>Name:</td>
												<td >
													<input type="text" name="Agencyname" id="Agencyname" value="" readonly></td>
												<td><input type="hidden" name="id" id="id" value=""></td>
												</tr>
												<tr>
												<td>Status:</td>
												<td><br><br><br><br>	
													<input type ="Radio" name="Status" value="Approved" >Approved<br>
													<input type ="Radio" name="Status" value="Rejected">Reject<br>
													<input type ="Radio" name="Status" value="Not Approved">Not Approved<br><br><br>
												<p style="color:Red;" id="validation_status"></p>
												</td>
												</tr>
											</table>
										<br><br>
										<input type ="Submit" id="changesubmit" value="Update"> &nbsp&nbsp
										<input type ="Reset" value="Reset">
										</strong>
										</fieldset>
										</form>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							  
							</div>
					  </div>
				</Section>
			</div>
  
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
<script>
function edit_id(id){
						$.ajax({
								   url: 'Sql/Statusmodal.php',
								   type: 'POST',
								   dataType: "json",
								   data: {id:id},
								   success: function(data){
									   //alert(data['Agency_name']);
									//console.log(data);
									$("#id").val(data['Agy_id']);
									 $("#Agencyname").val((data['Agency_name']));
									 } 
									});
					}
							$(document).ready(function(){
								$("input").focus(function(){
									$(this).css("background-color", "#cccccc");
								});
								$("input").blur(function(){
									$(this).css("background-color", "#ffffff");
								});

							// On Clicking Submit Button	
							$("#changesubmit").click(function(){
								//alert("inside Submit");
							if($('input[name=Status]:checked').length<=0)
								{
								 $('#validation_status').text("*Status is Mandantory*");
								 return false;
								}
							else {
								//alert("ELSE");
							var data = $('#statusform').serialize();
							console.log(data);
							$.ajax({
								url:"Sql/Editingstatus.php",
							   dataType: 'json',
								type: 'post',
								data:data,
								success: function(Editresponse){
									console.log(Editresponse);
								},
								error: function( jqXhr, textStatus, errorThrown ){
									console.log( errorThrown );
								}
							});
							alert("Status Updated Successfuly!");
							return true;
							}
							});
							});
					
		
</script>
</body>
</html>