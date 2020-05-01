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
  <title>Admin | Dashboard</title>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div  class="small-box bg-yellow">
            <div class="inner">
              <?php
				$sql_agency = "SELECT * from agencyregister "; /*Where status = 'Approved'";*/
				$result_agency = mysqli_query($conn,$sql_agency);
				$rowcount_agency = mysqli_num_rows($result_agency);							
			  ?>
              <h3><?php echo $rowcount_agency; ?></h3>

              <p>Total Agencies</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Total Booking </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Total Packages</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
<!--             <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
 -->          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
											<?php
								$sql_user = "SELECT * from userregister "; /*Where status = 'Approved'";*/
								$result_user = mysqli_query($conn,$sql_user);
								$rowcount_user=mysqli_num_rows($result_user);							
								?>			
              <h3><?php echo $rowcount_user;?></h3>

              <p>Registered User</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
          </div>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
											<?php
								$sql_total_packages = "SELECT * from packages "; /*Where status = 'Approved'";*/
								$result_total_packages = mysqli_query($conn,$sql_total_packages);
								$rowcount_total_packages=mysqli_num_rows($result_total_packages);							
								?>			
              <h3><?php echo $rowcount_total_packages;?></h3>

              <p>Total Packages</p>
            </div>
            <div class="icon">
              <i class="ion ion-folder"></i>
            </div>
          </div>
		</div>
		<div class="col-lg-3 col-xs-6">
		  <div class="small-box bg-red">
            <div class="inner">
											<?php
								$sql_honeymoon = "SELECT * from  packages where Category='Honeymoon' ";
								$result_honeymoon = mysqli_query($conn,$sql_honeymoon);
								$rowcount_honeymoon=mysqli_num_rows($result_honeymoon);							
								?>			
              <h3><?php echo $rowcount_honeymoon;?></h3>

              <p>Honeymoon Packages</p>
            </div>
            <div class="icon">
              <i class="ion ion-heart"></i>
            </div>
          </div>
        </div>
      <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-dark">
            <div class="inner">
                      <?php
                $sql_adventure = "SELECT * from  packages where Category='Adventure' ";
                $result_adventure = mysqli_query($conn,$sql_adventure);
                $rowcount_avdventure =mysqli_num_rows($result_adventure);             
                ?>      
              <h3><?php echo $rowcount_avdventure;?></h3>

              <p>Adventure Packages</p>
            </div>
            <div class="icon">
              <i class="ion ion-wineglass"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-blue">
            <div class="inner">
                      <?php
                $sql_wildlife = "SELECT * from  packages where Category='Adventure' ";
                $result_wildlife = mysqli_query($conn,$sql_wildlife);
                $rowcount_wildlife =mysqli_num_rows($result_wildlife);             
                ?>      
              <h3><?php echo $rowcount_wildlife;?></h3>

              <p>Wildlife Packages</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paw"></i>
            </div>
          </div>
        </div>  
        <!-- ./col -->
              <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
</body>
</html>