<?php
include('Includes/config.php');
session_start();
if(strlen($_SESSION['User_name'])==0)
  { 
    header('location:index.php');
  }
include('Includes/header.php') ?>
<title>User Profile </title>
<style type="text/css">
	.card {
    border-radius: 12px;
    box-shadow: 0 6px 10px -4px rgba(0, 0, 0, 0.15);
    background-color: #FFFFFF;
    color: #252422;
    margin-bottom: 20px;
    position: relative;
    border: 0 none;
    -webkit-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
    -moz-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
    -o-"transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
    -ms-transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
    transition: transform 300ms cubic-bezier(0.34, 2, 0.6, 1), box-shadow 200ms ease;
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card-user .image {
    height: 130px;
}

.card .image {
    overflow: hidden;
    height: 200px;
    position: relative;
}
.card-user .card-body {
    min-height: 240px;
}

.card .card-body {
    padding: 15px 15px 10px 15px;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.card-user .author {
    text-align: center;
    text-transform: none;
    margin-top: -77px;
}
.card-user .author a+p.description {
    margin-top: -7px;
}
p.description {
    font-size: 1.14em;
}
.description, .card-description, .footer-big p, .card .footer .stats {
    color: #9A9A9A;
    font-weight: 300;
}
.description, .card-description, .footer-big p, .card .footer .stats {
    color: #9A9A9A;
    font-weight: 300;
}
.text-center {
    text-align: center!important;
}
.card-user .card-body+.card-footer {
    padding-top: 0;
}

.card .card-footer {
    background-color: transparent;
    border: 0;
}
.card-footer:last-child {
    border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);
}
.card-footer {
    padding: .75rem 1.25rem;
    background-color: rgba(0,0,0,.03);
    border-top: 1px solid rgba(0,0,0,.125);
}
.card-user .button-container {
    margin-bottom: 6px;
    text-align: center;
}
.ml-auto, .mx-auto {
    margin-left: auto!important;
}
.mr-auto, .mx-auto {
    margin-right: auto!important;
}
.card-user .avatar {
    width: 124px;
    height: 124px;
    border: 1px solid #FFFFFF;
    position: relative;
}

.card .avatar {
    width: 120px;
    height: 120px;
    overflow: hidden;
    border-radius: 50%;
    margin-bottom: 15px;
}
img {
    max-width: 100%;
    border-radius: 3px;
}
img {
    vertical-align: middle;
    border-style: none;
}
.card-user .image {
    height: 130px;
}

.card .image {
    overflow: hidden;
    height: 200px;
    position: relative;
}
.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0.03);
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
.card-title {
    margin-bottom: 0.75rem;
}
.card .card-body {
    padding: 15px 15px 10px 15px;
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.list-unstyled {
    padding-left: 0;
    list-style: none;
}
.col-md-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%;
}

.col-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%;
}
.col-7 {
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%;
}
.col-md-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
}

.col-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
}
.profile-pic {
  position: relative;
  display: inline-block;
}

.profile-pic:hover .edit {
  display: block;
}

.edit {
padding-top: 70px; 
  padding-right: 120px;
  position: absolute;
  right: 0;
  top: 0;
  display: none;
}
.edit a {
  color: #000;
}
.active a{
  color: black; 
}
<?php 
$user_id =$_SESSION['U_id'];
$sql_status ="SELECT COUNT(Comment) from `Enquiry_status` where U_id ='$user_id'";
$result_status = mysqli_query($conn,$sql_status);
$row_status = mysqli_num_rows($result_status); 
/*Count Enquiry*/
$sql_enq_cnt ="SELECT COUNT(U_id) from `Package_enquiry` where U_id ='$user_id'";
$result_enq_cnt = mysqli_query($conn,$sql_enq_cnt);
$row_enq_cnt = mysqli_num_rows($result_enq_cnt); 
/* Total Reviews */
$sql_review ="SELECT COUNT(U_id) from `Rating` where U_id ='$user_id'";
$result_review = mysqli_query($conn,$sql_review);
$row_review = mysqli_num_rows($result_review); 
/*for Badge booking*/
$sql_booking_status ="SELECT COUNT(B_id) from `Booking_status` where U_id ='$user_id'";
$result_booking_status = mysqli_query($conn,$sql_booking_status);
$row_booking_status = mysqli_fetch_array($result_booking_status); 
/*Custom*/
$sql_custom_status ="SELECT COUNT(Cst_id) from `custom_enquiry` where U_id ='$user_id'";
$result_custom_status = mysqli_query($conn,$sql_custom_status);
$row_custom_status = mysqli_fetch_array($result_custom_status);
?>
</style>
  <link rel="stylesheet" href="Agency/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <div class="hero-wrap" style="background-color: Black ; height:100px">
      <div class="overlay"></div>
      <div class="container">
       
        </div>
      </div>
      <?php include('Includes/modals.php');?>
<section>
	 <section class="ftco-section ftco-degree-bg">
      <div class="container" style="max-width: 1300px;">
        <div class="row">
        	<div class="col-lg-3 sidebar ftco-animate">
        		<div class="sidebar-wrap bg-light ftco-animate">

			 	<ul style="list-style-type:none;">
			 		<div class="row" style="font-size: 23px;font-family: Gill Sans">
			 		<span style="padding-right: 10px"><i class="fa fa-user"></i></span>
			 		<li class="active">
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
          <li class="">
                  <a href="Reviewed.php"><p>Reviewed</p></a>
              </li>
          </div>
			 	</ul>
        		</div>
          </div>

          <div class="col-lg-9">
          	<!-- <div class="row">
          	<span style="padding-right: 10px"><i class="fa fa-tasks"></i></span>DASHBOARD
          	</div> -->
          	<div class="row">
          		<div class="col-md-8">
            <div class="card card-user">
              <div class="image">
                <img src="images/backpicture.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <form method="post"  name="Userpictureform" id="Userpictureform" enctype='multipart/form-data'>
                  <div class="profile-pic">
                    <?php if($_SESSION['User_image']== "" ){
                   if($_SESSION['Gender'] == "Male"){ ?>
                    <div class="pro-image"><img class="avatar border-gray" src="images/dummy.jpg" alt="..."></div>
                    <?php } else{ ?>
                    <div class="pro-image"><img class="avatar border-gray" src="images/dummyfemale.jpg" alt="..."></div>

                  <?php } } else{ 
                    $image_id = $_SESSION['U_id'];
                    $sql_image ="SELECT User_image from userregister Where U_id = $image_id";
                    $result_image = mysqli_query($conn,$sql_image);
                    $fetch_image = mysqli_fetch_assoc($result_image); 
                    $Image_name = $fetch_image["User_image"];
                   ?>
                    <div class="pro-image"><img class="avatar border-gray" src="User/<?php echo $Image_name;?>" alt="..."></div>
<?php } ?>
                    <div class="edit"><a href="" class="editicon" onclick="document.getElementById('fileToUpload').click(); return false"><i class="fa fa-edit fa-lg"></i>Change</a></div>
                    
                    <input type="file" class="file" name="proofpic"  id="fileToUpload" style="visibility: hidden; width: 1px; height: 1px">
                  </div>
                  </form>
                    <h5 class="title">
                      <?php echo $_SESSION['User_name'];?>
                    </h5>
                  <p class="description">
                   <input type="hidden" name="U_id" class="description" id="U_id" value="<?php echo $_SESSION['U_id'];?>" Readonly="true">
                    <input type="text" name="Email_id" class="description inputDisabled" id="Email_id" style="border: none;
border-color: transparent;text-align: center;width: 80%" value="<?php echo $_SESSION['Email_id'];?>" Readonly="true">
                    <br>
                   <input type="text" name="Mobile_no" class="description inputDisabled" id="Mobile_no" style="border: none;
border-color: transparent;text-align: center;" value="<?php echo $_SESSION['Mobile_no'];?>" Readonly="true">
                    <br>
                   <?php echo $_SESSION['DOB'];
                         echo "<br>";
                         echo $_SESSION['Gender'];
                   ?>
                    <br>

                  </p>
                </div>
                <p class="description text-center">
                  Hey <?php echo $_SESSION['User_name'];?>
                  <br> Good To See You!
                  <br>"Explore The Package And Enjoy The Life"

                </p>
                <p id="validation_user" style="color: red;"></p>
                <button class="btn btn-round btn-danger" id="Edit_user" style="float: right;">Edit Information</button>
                <button class="btn btn-round btn-success" id="Update_user" style="float: right;">Apply</button>

              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5><?php echo $row_review;?>
                        <br>
                        <small>Reviews</small>
                      </h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>0
                        <br>
                        <small>Booking</small>
                      </h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5><?php echo $row_enq_cnt;?>
                        <br>
                        <small>Enquiry Done</small>
                      </h5>
                    </div>
                  </div>
                </div>

              </div>
            </div>
           
           <!-- For Email Box Of Green And  -->
                    <!--   <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div> -->
                    
         
          </div> <!-- .col-md-8 -->
        </div>
      </div>
  </div>
</div>
  </section>
</section>
<?php include('Includes/footer.php'); ?>
<script>
  $(".file").on("change",function(){
//alert ("Inside File Function");
var U_id =<?php echo$_SESSION['U_id'];?>;
//alert(U_id);

   var file = new FormData();
   file.append('file',$('.file')[0].files[0]);
   file.append('user_id',U_id);
   $.ajax({
    url: "User_image.php",
    type: "post",
    data: file,
    processData: false,
    contentType: false, 
  success:function(respo){
    if(respo =="Updated"){
      alert("Updated");
      location.reload();
    }
    else{
      alert("Error");
    }
    }
});
});
		$( document ).ready(function() { 
      $('#Update_user').hide();
    $('#state').change(function(){
        state_id = $('#state').val();
        //alert(state_id );
        passdata = {state1:state_id};
        $.ajax({
          url:"Sql_entry/find_city.php",
          data:passdata,
          type:"post",
          success:function(response){
            //alert(response);
            $('#agencycity').html(response);
          }
        })

      })
});
  $('#Edit_user').click(function(){
        $('.inputDisabled').removeAttr("Readonly");
        $('#Update_user').show();
        $('#Edit_user').hide();
        $('#validation_user').text('**Click the label to Edit');
        setTimeout(function() {
          $('#validation_user').fadeOut('fast');
        }, 2500);
      });
      $('#Update_user').click(function(){      
        var U_id = $('#U_id').val();
        var Email_id = $('#Email_id').val();
        var Mobile_no = $('#Mobile_no').val();
        data = { user_id: U_id, user_email: Email_id,user_mobile: Mobile_no };
        $.ajax({
              url: 'Sql_entry/userprofile_edit.php',
              type: 'post',
              data:data,
              success: function(editresponse){
                  if(editresponse =="New record created successfully"){
                    alert('Successfully Changed');
                    $('#Edit_user').show();
                    $('#Update_user').hide();
                    $('.inputDisabled').attr("Readonly",'true');

                  }
                  else{
                    alert('**Try Again** After Some Time');
                  }
              }
            }); 
      });
</script> 
</body>
</html>