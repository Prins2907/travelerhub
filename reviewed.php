<?php
include('Includes/config.php');
session_start();
if(strlen($_SESSION['User_name'])==0)
  { 
    header('location:index.php');
  }
include('Includes/header.php') ?>
<title>User Reviewed</title>
<?php 
$user_id =$_SESSION['U_id'];
$sql_status ="SELECT COUNT(Comment) from `rating` where U_id ='$user_id'";
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
  <link rel="stylesheet" href="Agency/bower_cents/bootstrap-daterangepicker/daterangepicker.css">
    <div class="hero-wrap" style="background-color: Black ; height:100px">
      <div class="overlay"></div>
      <div class="">ompon
       
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
			 		<li class="">
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
          <li class="active">
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
              <th scope="col" colspan="11">Your Reviews</th>
            </tr>
          </thead>
           <thead class="thead-light" style="text-align: center;text-decoration: underline;">
            <tr>
              <th scope="col">Sr No</th>
              <th scope="col">Agency Name</th>              
              <th scope="col">Visited</th>
              <th scope="col">You Rated</th>
              <th scope="col">Comment</th>
            </tr>
         </thead>
  <?php
$count=1;
$U_id = $_SESSION["U_id"];
$sql = "SELECT * FROM `Rating` where U_Id = '$U_id'";
$result = $conn->query($sql); 
if ($result->num_rows > 0){
 while($row = $result->fetch_assoc()) { ?>
  
<tr>
    <td align="center"><?php echo $count; ?></td>
    <?php
     $A_id = $row['Agy_id'];
      $sql_agy_name="SELECT Agency_name from `agencyregister` where Agy_id ='$A_id'";
      $result_agy_name = mysqli_query($conn,$sql_agy_name);
      $fetch_agy_name = mysqli_fetch_assoc($result_agy_name); 
      $Agy_name = $fetch_agy_name["Agency_name"];

      ?>
    <td align="center">
    <?php echo $Agy_name; ?>
    </td>
    <td align="center">
    <?php echo $row['Visited'] ?>
    </td>
    <td align="center">
    <?php echo $row['Star_rated'] ?>
    </td>
    <td align="center">
    <?php echo $row['Comment'] ?>
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
</section>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<?php include('Includes/footer.php'); ?>
</body>
</html>