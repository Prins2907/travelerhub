<?php 
session_start();
  if(strlen($_SESSION['name'])==0)
  { 
    header('location:index.php');
  } 
?>
<?php include('includes/config.php');?>
<?php
// Code for change password 
if(isset($_POST['submit']))
{
$password = $_POST["password"]; 
$newpassword=$_POST["newpassword"];
$username=$_SESSION['name'];
$sql ="SELECT Password FROM agencyregister WHERE Agency_name='$username' and Password='$password' ";
$result = mysqli_query($conn,$sql);
 $ftch = mysqli_fetch_assoc($result);
 $result1 =$ftch["Password"];
if($result1 == "$password")
{
$con="update agencyregister set Password='$newpassword' where Agency_name='$username'";
  if ($conn->query($con) === TRUE) {
    $msg="Your Password Successfully Changed";  
echo "<script type='text/javascript'>alert('$msg');
location.href = 'profile.php';
</script>";

  } 
}
else {
$error="Your current password is wrong";  
echo "<script type='text/javascript'>alert('$error');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agency | Change Password</title>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>Change Password</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.pho"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>

        <form  name="chngpwd" method="post" class="form-horizontal" onSubmit="return valid();">
        <div class="box-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Current Password</label>
              <div class="col-md-8">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </span>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Current Password" required="">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">New Password</label>
              <div class="col-md-8">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </span>
                  <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" required="">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Confirm Password</label>
              <div class="col-md-8">
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </span>
                  <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confrim Password" required="">
                </div>
              </div>
            </div>
          </div>
            <div class="box-footer">
                <button type="Submit" name="submit" id="submit" class="btn btn-info btn-default ">Submit</button>
                <button type="Reset" class="btn btn-default">Reset</button>
              </div>
        </form>
    </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
<!-- Script For Validating the Password and Confirm Password -->
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