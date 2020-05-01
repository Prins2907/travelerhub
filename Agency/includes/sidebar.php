          <?php
          $id = $_SESSION['id'];
           $sql = "SELECT * FROM agencyregister where Agy_id = '$id' ";
           $result = mysqli_query($conn,$sql);
           $ftch = mysqli_fetch_assoc($result);
           $prvlogo = "../Logo/".$ftch['Logo'];
           ?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image" >
          <img src="<?php echo $prvlogo; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php
          //$agency_name = $_SESSION['name'];
          echo $agency_name;
            ?>    
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php
      $sql_count_book = "SELECT count(Status) FROM booking_status where Agy_id ='$id'";
      $result_book = mysqli_query($conn,$sql_count_book);
      $ftch_book = mysqli_fetch_array($result_book);

      ?>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span> 
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Packages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="create-packages.php"><i class="fa fa-circle-o"></i>Add Packages</a></li>
            <li><a href="manage-packages.php"><i class="fa fa-circle-o"></i>Edit Packages</a></li>
            <li><a href="add-features.php"><i class="fa fa-circle-o"></i>Package Features</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Booking</span>
            <!-- <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span> -->
          </a>
          <ul class="treeview-menu">
            <li><a href="bookinghistory.php"><i class="fa fa-circle-o"></i>History &nbsp<small class="label bg-yellow"><?php echo $ftch_book[0];?></small></a></li>
<!--             <li><a href=""><i class="fa fa-circle-o"></i>Manage Booking</a></li>
 -->            <li><a href="bookingenquiry.php"><i class="fa fa-circle-o"></i>Enquiry</a></li>

          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-edit"></i> <span>Custom Packages Enquiry</span>
            <span class="pull-right-container">
<!--               <small class="label pull-right bg-green">new</small>
 -->            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i>Manages</a></li>
<!--             <li><a href=""><i class="fa fa-circle-o"></i>Manage Booking</a></li>
 -->          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Gallery Uploads</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view-gallery.php"><i class="fa fa-circle-o"></i>View $ Manage</a></li>
            <li><a href="gallery-upload.php"><i class="fa fa-circle-o"></i>Upload Images</a></li>
            
          </ul>
        </li>
        <!--               <small class="label pull-right bg-green">new</small>
 -->        

      <?php    
  $sql_about_us = "select * from aboutus where Agy_id = $id";
  $res_about_us = mysqli_query($conn,$sql_about_us);
  if(mysqli_num_rows($res_about_us)>0)
  {
   ?>
   <li class="treeview" id="Edit_about_us">
          <a href="#">
            <i class="fa fa-edit"></i> <span>About us</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="editaboutus.php"><i class="fa fa-circle-o"></i>Edit</a></li>
          </ul>
        </li>
   <?php
  }
  else{
    ?>
    <li class="treeview" id="Add_about_us">
          <a href="#">
            <i class="fa fa-edit"></i> <span>About us</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addaboutus.php"><i class="fa fa-circle-o"></i>Add</a></li>
          </ul>
        </li>

   <?php
  }
  ?>
        <!-- <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>