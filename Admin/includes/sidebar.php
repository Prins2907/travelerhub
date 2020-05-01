          <?php
           $id = $_SESSION['id'];
           $sql = "SELECT * FROM admin where Admin_id = $id ";
           $result = mysqli_query($conn,$sql);
           $ftch = mysqli_fetch_assoc($result);
           $prvlogo = "adminsimages/".$ftch['User_name'].'.jpg';
           ?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image" >
          <img src="<?php echo $prvlogo; ?>" class="img-circle img-responsive" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php
          //$agency_name = $_SESSION['name'];
          echo $User_name;
            ?>    
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
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
            <i class="fa fa-files-o"></i> <span>Agencies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<!--             <li><a href="add-agencies.php"><i class="fa fa-circle-o"></i>Add Agencies</a></li>
 -->            <li class="active" ><a href="manage-agencies.php"><i class="fa fa-circle-o"></i>Manage Agencies</a></li>

          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<!--             <li><a href="add-users.php"><i class="fa fa-circle-o"></i>Add Users</a></li>
 -->            <li><a href="manage-users.php"><i class="fa fa-circle-o"></i>Manage Users</a></li>

          </ul>
        </li>
		<!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-list-ul"></i> <span>Places</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add-states.php"><i class="fa fa-circle-o"></i>Add State</a></li>
            <li><a href="add-cities.php"><i class="fa fa-circle-o"></i>Add Cities/Town</a></li>

          </ul>
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Booking</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i>History</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>Manage Booking</a></li>
          </ul>
        </li> -->
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
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Gallery Uploads</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i>Package Name </a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>Package Name </a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>Package Name </a></li>
            <li><a href=""><i class="fa fa-circle-o"></i>Package Name</a></li>
          </ul>
        </li> -->
        
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
            <li><a href="../Agency/pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="../Agency/pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="../Agency/pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="../Agency/pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="../Agency/pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="../Agency/pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="../Agency/pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="../Agency/pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="../Agency/pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>