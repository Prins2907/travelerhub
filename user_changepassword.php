<?php
include('Includes/config.php');
session_start();
if(strlen($_SESSION['User_name'])==0)
  { 
    header('location:index.php');
  }
include('Includes/header.php') ?>
<?php
// Code for change password 
if(isset($_POST['submit']))
{
$password = $_POST["password"]; 
$newpassword=$_POST["newpassword"];
$Email_id = $_SESSION['Email_id'];
$sql ="SELECT Password FROM userregister WHERE Email_id ='$Email_id' and Password='$password' ";
$result = mysqli_query($conn,$sql);
$ftch = mysqli_fetch_assoc($result);
$result1 =$ftch["Password"];
if($result1 == "$password")
{
$updatepass="UPDATE userregister set Password='$newpassword' where Email_id='$Email_id'";
  if ($conn->query($updatepass) === TRUE) {
    $msg="Your Password Successfully Changed";  
echo "<script type='text/javascript'>alert('$msg');
location.href = 'user_profile.php';
</script>";

  } 
}
else {
$error="Your current password is wrong";  
echo "<script type='text/javascript'>alert('$error');</script>";
}
}
?>
<title>User Change Password </title>
<?php 
$user_id =$_SESSION['U_id'];
$sql_status ="SELECT COUNT(Comment) from `Enquiry_status` where U_id ='$user_id'";
$result_status = mysqli_query($conn,$sql_status);
$row_status = mysqli_num_rows($result_status); 
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
      <div class="container">
        <h1 style="color: white;border: solid black;background-color: black;padding-left: 10px">Change Password</h1>
        <div class="row">
          <div class="col-lg-9">
            <div class="row" style="padding-left: 20px">
              <div class="col-md-8" style="border: dashed; padding-top:15px ">
            <form  name="chngpwd" method="post" class="form-horizontal" onSubmit="return valid();">
        <div class="box-body">
            <div class="form-group">
              <p style="font-size: 18px;padding-left: 15px">* Current Password</p>
              <div class="col-md-8">
                <div class="input-group">
                 <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Current Password" required="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <p style="font-size: 18px;padding-left: 15px">* New Password</p>
              <div class="col-md-8">
                <div class="input-group">
                <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" required="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <p style="font-size: 18px;padding-left: 15px">* Confirm Password</p>
              <div class="col-md-8">
                <div class="input-group">
                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confrim Password" required="">
                </div>
              </div>
            </div>
          </div>
              <div class="row" style="padding: 30px">
                <button type="Submit" name="submit" id="submit" class="btn btn-info btn-default">Submit</button>&nbsp&nbsp
                <button type="Reset" class="btn btn-default">Reset</button>
              </div>
          </form>
          
          </div> <!-- .col-md-8 -->
        </div>
      </div>
  </div>
</div>
  </section>
</section>
<?php include('Includes/footer.php'); ?>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</body>
</html>