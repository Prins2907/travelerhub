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
  <title>Agency | Profile </title>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><b>
        User Profile</b>  
        <small>Information</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <?php
          $id = $_SESSION['id'];

           $sql = "SELECT * FROM agencyregister where Agy_id = $id ";
           $result = mysqli_query($conn,$sql);
           $ftch = mysqli_fetch_assoc($result);
           $prvlogo = "../Logo/".$ftch['Logo'];
           ?>
      <div class="tab content">
          <img  class="img-responsive img-rounded" width="300px" height="400px" src="<?php echo $prvlogo;?>"  id="preview" alt=""> 
      </div>
      
      <div class="col-sm-8">
        <table class="table table-hover table-bordered"  style="height:280px;border:1px solid black" id="Profiletable">
          <tr>
              <th>User Name</th>
              <td>
              <?php
              echo $ftch["Username"]; ?>
            </td>
            </tr>
            <tr>
              <th>Email</th>
              <td>
                <?php
              echo $ftch["Email_id"]; ?>
            </td>
            </tr>
            <tr>
              <th>Contact No</th>
              <td>
                <?php
              echo $ftch["Contact_no"]; ?>
            </td>
            </tr>
            <tr>
              <th>City</th>
              <td>
                <?php
              echo $ftch["Ct_id"]; ?>
            </td>
            </tr>
            <tr>
              <th>Address</th>
              <td>
                <?php
              echo $ftch["Address"]; ?>
            </td>
            </tr>
            
        </table>
      </div>

      </div>
     <a href="#" class="btn btn-sm btn-info"><b>Edit Profile</b></a>
      <a href="change-password.php" class="btn btn-sm btn-info"><b>Change Password</b></a>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
</body>
</html>