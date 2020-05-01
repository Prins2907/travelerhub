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
  <title>Admin | Manage User </title>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Manage Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Users</li>
      </ol>
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
			<div class="w3-responsive">
	  
					  <h2>Manage Users</h2>
					    <table class="w3-table-all w3-small" id="table">
						<thead>
					<tr class="w3-pink">
						<th>#</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Email</th>
							<th>Contact No</th>
							<th>City</th>
							<th>Status</th>
							<th> Status Action</th>
   					</tr>
						</thead>
						<tbody>
									<?php
$count=1;
$servername = "localhost";
$username = "root";
$password = "";
$dbname="travelershub";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM userregister";
$result = $conn->query($sql);	
if ($result->num_rows > 0){
    // output data of each row
 while($row = $result->fetch_assoc()) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center">
<?php echo $row["Full_name"]; ?>
</td>
<td align="center">
<?php echo $row["Gender"]; ?>
</td>
<td align="center">
<?php echo $row["Email_id"]; ?>
</td>
<td align="center">
<?php echo $row["Mobile_no"]; ?>
</td>
<td align="center">
<?php echo $row["City"]; ?>
</td>
<td align="center">
<?php echo $row["Status"]; ?>
</td>
<td align="center">
<a href="javascript:void(0)"  data-toggle="modal" data-target="#userstatusmodal"  onclick="edit_id(<?php echo $row["U_id"];?>)">Edit </a>
</td>
</tr>
<?php $count++; }
}
?>
						</tbody>
					  </table>
					</div>
					<Section>
					<div class="modal fade" id="userstatusmodal" role="dialog">
						<div class="modal-dialog">
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title">Status Change</h4>
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  
							</div>
							<div class="modal-body">
								<form name="userstatusform" id="userstatusform" method="post" align="left" enctype='multipart/form-data' > <!--  onsubmit="return validateForm()" --> 
								<fieldset>
								<strong>
								<br>
									<table>
									<tr>
									<td>Name:</td>
									<td ><input="Text" name="username" id="username" value="" disabled></p></td>
									<td><input type="hidden" name="id" id="id" value=""></td>
									</tr>
									<tr>
									<td>Status:</td>
									<td><br><br><br><br>	
										<input type ="Radio" name="Status" value="Approved" >Approved<br>
										<input type ="Radio" name="Status" value="Rejected" >Reject<br>
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
<?php include('includes/footer.php');?>
<script>
function edit_id(id){
						$.ajax({
								   url: 'Sql/userstatusmodal.php',
								   type: 'POST',
								   dataType: "json",
								   data: {id:id},
								   success: function(data){
									   //alert(data['Agency_name']);
									//console.log(data);
									$("#id").val(data['U_id']);
									 $("#username").text((data['Full_name']));
									 } 
									});
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
							var data = $('#userstatusform').serialize();
							//console.log(data);
							$.ajax({
								url:"Sql/Usereditingstatus.php",
							   // dataType: 'json',
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
					}
		
</script>

</body>
</html>