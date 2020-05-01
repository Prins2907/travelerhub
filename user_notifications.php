
<?php
include('Includes/config.php');
session_start();
if(strlen($_SESSION['User_name'])==0)
  { 
    header('location:index.php');
  }
include('Includes/header.php') ?>
<title>User Notifications</title>
<?php 
$user_id =$_SESSION['U_id'];
$sql_status ="SELECT COUNT(Comment) from `Enquiry_status` where U_id ='$user_id'";
$result_status = mysqli_query($conn,$sql_status);
$row_status = mysqli_num_rows($result_status);
/*for Badge booking*/
$sql_booking_status ="SELECT COUNT(B_id) from `Booking_status` where U_id ='$user_id'";
$result_booking_status = mysqli_query($conn,$sql_booking_status);
$row_booking_status = mysqli_fetch_array($result_booking_status);
/*Custom*/
$sql_custom_status ="SELECT COUNT(Cst_id) from `custom_enquiry` where U_id ='$user_id'";
$result_custom_status = mysqli_query($conn,$sql_custom_status);
$row_custom_status = mysqli_fetch_array($result_custom_status); 
?><style>
.active a{
  color: black; 
}
.inputfont{
  font-size: 15px;
}
</style>
  <link rel="stylesheet" href="Agency/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <div class="hero-wrap" style="background-color: Black ; height:100px">
      <div class="overlay"></div>
      <div class="">
       
        </div>
      </div>
<section>
	 <section class="ftco-section ftco-degree-bg">
      <div class="container" style="max-width: 1300px;">
        <div class="row">
        	<div style="float: left;padding-right: 10px">
        		<div class="bg-light border" style="padding-right: 20px">

			 	<ul style="list-style-type:none;">
			 		<div class="row" style="font-size: 23px;font-family: Gill Sans">
			 		<span style="padding-right: 10px"><i class="fa fa-user"></i></span>
			 		<li class="">
			            <a href="user_profile.php"><p>User Profile</p></a>
			        </li>
			    </div>
			    <div class="row" style="font-size: 23px;font-family: Gill Sans">
			 		<span style="padding-right: 10px"><i class="fa fa-book"></i></span>
			 		<li class="">
			            <a href="booking.php"><p>Booking History<span class="badge badge-primary"><?php echo $row_booking_status[0];?></span></p></a>
			        </li>
			    </div>
			    <div class="row" style="font-size: 23px;font-family: Gill Sans">
			 		<span style="padding-right: 10px"><i class="fa fa-bell"></i></span>
			 		<li class="active">
			            <a href="user_notifications.php"><p style="padding-right: 20px ">Notifications<span class="badge badge-primary"><?php echo $row_status;?></span></p></a>
			        </li>
			    </div>
          <div class="row" style="font-size: 23px;font-family: Gill Sans">
          <span style="padding-right: 10px"><i class="fa fa-bell"></i></span>
          <li class="">
                  <a href="custom_notifications.php"><p style="padding-right: 20px ">Custom Enquiry<span class="badge badge-primary"><?php echo $row_custom_status[0];?></span></p></a>
              </li>
          </div>
           <div class="row" style="font-size: 23px;font-family: Gill Sans">
          <span style="padding-right: 10px"><i class="fa fa-star"></i></span>
          <li class="">
                  <a href="Reviewed.php"><p>Reviewed</p></a>
              </li>
          </div>
			 	</ul>
        		</div>
          </div>

          <div class="col-lg-9">
          	<div class="row">
         <table  class="table table-bordered table-sm" style="border-color:white; width: 100%">
           <!-- <tr><td colspan="2">Enquiry Notifications</td></tr> -->
           <thead class="thead-dark">
            <tr>
              <th scope="col" colspan="11">Enquiry Notifications</th>
            </tr>
          </thead>
           <thead class="thead-light" style="text-align: center;text-decoration: underline;">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Enquiry No</th>              
              <th scope="col">Package Name</th>
              <th scope="col">Package Type</th>
              <th scope="col">Agency Name</th>
              <th scope="col">Departure Date</th>
              <th scope="col">Adults & Children</th>
              <th scope="col">Comment</th>
              <th scope="col">Status</th>
              <th scope="col">Booking</th>
              <th scope="col">Action</th>
            </tr>
         </thead>
  <?php
$count=1;
$U_id = $_SESSION["U_id"];
$sql = "SELECT * FROM `Enquiry_status` where U_Id = '$U_id'";
$result = $conn->query($sql); 
if ($result->num_rows > 0){
 while($row = $result->fetch_assoc()) { ?>
  
<tr>
    <td align="center"><?php echo $count; ?></td>
    <?php
     $P_enq_id = $row['Pack_enquiry_id'];
     $sql_pack_id = "SELECT * from `Package_enquiry` where Pack_enquiry_id ='$P_enq_id'";
     $result_pack_id = $conn->query($sql_pack_id);
     $row_pack_id = $result_pack_id->fetch_array();
     $P_id = $row_pack_id['P_id'];
     $Agency_id =$row_pack_id['Agy_id'];
     /*For Pack Name Display*/
     $sql_pack_name="SELECT Package_name from `packages` where P_id ='$P_id'";
      $result_pack_name = mysqli_query($conn,$sql_pack_name);
      $fetch_pack_name = mysqli_fetch_assoc($result_pack_name); 
      $Pack_name = $fetch_pack_name["Package_name"];
      /*For Agency Name Display*/
      $sql_agy_name="SELECT Agency_name from `agencyregister` where Agy_id ='$Agency_id'";
      $result_agy_name = mysqli_query($conn,$sql_agy_name);
      $fetch_agy_name = mysqli_fetch_assoc($result_agy_name); 
      $Agy_name = $fetch_agy_name["Agency_name"];

      ?>
      <td align="center">
    <?php echo $row["Pack_enquiry_id"]; ?>
    </td>
    <td align="center">
    <?php echo $Pack_name; ?>
    </td>
    <td align="center">
    <?php echo $row_pack_id["Type"]; ?>
    </td>
    <td align="center">
    <?php echo $Agy_name; ?>
    </td>
    <td align="center">
    <?php echo $row_pack_id['Departure_date']; ?>
    </td>
    <td align="center">
    <?php echo "Adults = ".$row_pack_id['Adults']."<br> Children = ".$row_pack_id['Children']; ?>
    </td>
    <td align="center">
    <?php echo $row["Comment"]; ?>
    </td>
    <td align="center" style="color: darkblue;font-weight: bold;">
    <?php echo $row["Status"]; ?>
    </td>
    <td align="center">
      <a href="javascript:void(0)" style="color: green;font-weight: bold;" onclick="booking_id(<?php echo $row["Pack_enquiry_id"];?>)" data-toggle="modal" data-target="#Bookingconfirm">Booking</a>
    </td>
    <td align="center" style="color: red;font-weight: bold;">
    Reject
    </td>
</tr>
<?php $count++; }
}
else{ 
  ?>
<tr>
  <td scope="col" colspan="8">No Result Found Or Your Enquiry Yet Not Replied!</td>
</tr>
<?php 
}
?>

       </table>
          </div> <!-- .col-md-8 -->
          
        </div>
      </div>
  </div>
    </section>
    <SECTION>
            <div class="modal fade" id="Bookingconfirm" role="dialog">
            <div class="modal-dialog modal-lg">
              
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header" style="background-color: #367fa9">
                <h4 class="modal-title ">Confirm Booking</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                  <section class="content">
                    <form action="PayUMoney_form.php" name="Confirmform" id="Confirmform" method="get" class="form-horizontal">
                    <div class="box-body">Package By:
                      <p id="Pack_agency_name" style="font-weight: bold;"></p>
                      <div class="row">
                        <input type="hidden" name="U_id" id="U_id" value="<?php echo $_SESSION['U_id']; ?>" readonly="">
                         <input type="hidden" name="Agy_id" id="Agy_id" value="" readonly="">
                        <input type="hidden" name="Pack_enquiry_id" id="Pack_enquiry_id" value="" readonly="">
                        <input type="hidden" name="P_id" id="P_id" value="" readonly=""> 
                        <input type="hidden" name="Total_members" id="Total_members" value="" readonly="">                       
                        <div class="col-lg-4">
                           <div class="form-group">
                            <label for="forname">Pack Selected</label>
                              <div class="input-group">
                                      <span class="input-group-addon"  style="padding: 10px;border: solid 1px"><i class="fa fa-user"></i></span>
                                      <input type="text" class="form-control  inputfont" name="Pack_name" id="Pack_name" value="" readonly>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-5">
                               <div class="form-group">
                                <label for="forname">Email Id</label>
                              <div class="input-group">
                                <span class="input-group-addon" style="padding: 10px;border: solid 1px"><i class="fa fa-envelope" ></i></span>
                                <input type="Email" class="form-control inputfont" name="Email_id" id="Email_id" placeholder="Email" value="<?php echo $_SESSION['Email_id'];?>" Readonly>
                            </div>
                          </div>
                      </div>
                      <div class="col-lg-3">
                               <div class="form-group">
                                <label for="forname">Type</label>
                              <div class="input-group">
                                <span class="input-group-addon"  style="padding: 10px;border: solid 1px"><i class="fa fa-bed"></i></span>
                                <input type="text" class="form-control inputfont" name="Type" id="Type" value="" Readonly>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                           <div class="form-group">
                            <label for="forname">Mobile Number</label>
                              <div class="input-group">
                                      <span class="input-group-addon"  style="padding: 10px;border: solid 1px"><i class="fa fa-address-book"></i></span>
                                      <input type="Number" class="form-control inputfont" name="Mobile_no" id="Mobile_no" placeholder="Enter 10 digits Number" value="<?php echo $_SESSION['Mobile_no'];?>">
                              </div>
                          </div>
                      </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                            <label for="forname">Depature Date</label>
                              <div class="input-group">
                                      <span class="input-group-addon"  style="padding: 10px;border: solid 1px"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control inputfont" name="Departure_date" id="Departure_date" value="" readonly>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3">
                      <div class="form-group">
                            <label for="forname">Price/Person</label>
                              <div class="input-group">
                                      <span class="input-group-addon"  style="padding: 10px;border: solid 1px"><i class="fa fa-rupee"></i></span>
                                    <input type="text" class="form-control inputfont" name="Pack_Price" id="Pack_Price">
                              </div>
                          </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                            <label for="forname">Log-In User</label>
                              <div class="input-group">
                                      <span class="input-group-addon"  style="padding: 10px;border: solid 1px"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control inputfont" name="User_name" id="User_name" value="<?php echo $_SESSION['User_name'];?>" readonly>
                              </div>
                          </div>
                    </div>
                    </div>
                    <div style="font-weight: bold;">
                      For Adults
                      </div>
                      
                    <div style="padding-left: 15px" id="Adults">

                      </div>
                       <div style="font-weight: bold;padding-top: 15px">
                      For Children
                      </div>
                      
                    <div style="padding-left: 15px" id="Children">

                      </div>    
                    </div> 
                    <br>
                  
                    <input type="submit" name="Submit" id="bookingsubmit" class="btn btn-danger float-right">   
                    </form>
                </section>
                    
                </div>
                </div>
                
              </div>
            </div>
          </SECTION>
</section>
<script>
  function booking_id(id){
$('#Pack_enquiry_id').val(id);
            $.ajax({
                   url: 'Sql_entry/Booking_data.php',
                   type: 'POST',
                   dataType: "json",
                   data: {id:id},
                   success: function(data){
                    console.log(data);
                    //alert(data['P_id']);
                    $('#Agy_id').val(data['Agy_id']);
                    $('#P_id').val(data['P_id']);
                    $('#Pack_name').val(data['Package_name']);
                    $('#Type').val(data['Type']);
                    $('#Departure_date').val(data['Departure_date']);
                    $('#Pack_Price').val(data['Price']);
                    $('#Pack_agency_name').text(data['Agency_name']);                    
                    var count_adult = data['Adults'];
                    var count_children = data['Children'];
                    var mmbrs = parseInt(data['Adults'])+parseInt(data['Children']);
                    //alert(Total_mmbrs);
                    $('#Total_members').val(mmbrs);
                    for(var i = 1; i <= count_adult; i++) {
                      $('#Adults').append("<div class='row'style='padding-top:10px; font-weight:bold;'><label class='col-lg-6'>Name "+ i + " : </label><label class='col-lg-2'>Age "+ " </label><label class='col-lg-3'>Gender</label></div>" );
                    $('#Adults').append('<div class="row"><input type="text" class="col-lg-6 form-control inputrequired inputfont"  name="Adult_name[]" value="" placeholder="Person Name" required>'+"&nbsp &nbsp"+'<input type="number"  class="col-lg-2 form-control inputrequired inputfont" name="Adult_age[]" value="" required>'+"&nbsp &nbsp"+'<select class="col-lg-3 form-control inputfont" name="Adult_gender[]"><option value="Male">Male</option><option value="Female">Female</option></select></div>');
                    }
                     
                    for(var i = 1; i <= count_children; i++) {
                      $('#Children').append("<div class='row'style='padding-top:10px; font-weight:bold;'><label class='col-lg-6'>Name "+ i + " : </label><label class='col-lg-2'>Age "+ " </label><label class='col-lg-3'>Gender</label></div>" );
                    $('#Children').append('<div class="row"><input type="text" class="col-lg-6 form-control inputrequired inputfont"  name="Children_name[]" value="" placeholder="Child Name" required>'+"&nbsp &nbsp"+'<input type="number"  class="col-lg-2 form-control inputfont inputrequired" name="Children_age[]" value="" required>'+"&nbsp &nbsp"+'<select class="col-lg-3 form-control"name="Children_gender[]"><option value="Male">Male</option><option value="Female">Female</option></select></div>');
                    }

                   }
                  });
          }
</script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script >
  $(document).ready(function(){
  })
</script>
<?php include('Includes/footer.php'); ?>
</body>
</html>