<?php 
session_start();

  if(strlen($_SESSION['name'])==0)
  { 
    header('location:index.php');
  } 
?>
<?php include('includes/config.php'); ?>
<?php
if(isset($_POST['Add']))
  {
$Agy_id = $_POST['Agy_id'];
$About_detail = mysqli_escape_string($conn,$_POST['About_detail']);
$Services = implode(", ", $_POST["Services"]);
$sql_insert = "INSERT into `aboutus`(Agy_id,About_detail,Services) Values('$Agy_id','$About_detail','$Services')";
echo $sql_insert;
 if (mysqli_query($conn,$sql_insert) == true) {
    echo "<script type='text/javascript'>alert('Successfully Submitted');</script>";
    header('location:dashboard.php');
  }
 else {
    echo "<script> alert('** Log-out Your Session & Try Again **'); </script";   
}
  }
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agency | Edit About us</title>
  <style type="text/css">
  .checkcontainer {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
    .checkcontainer input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.checkcontainercheckmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}
/* On mouse-over, add a grey background color */
.checkcontainer:hover input ~ .checkcontainercheckmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.checkcontainer input:checked ~ .checkcontainercheckmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkcontainercheckmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.checkcontainer input:checked ~ .checkcontainercheckmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.checkcontainer .checkcontainercheckmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
  </style>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        About Us
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.pho"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">About Us</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add About Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" class="form-horizontal" method="post" enctype='multipart/form-data'>
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="Agy_id" id="Agy_id" value="<?php echo $_SESSION['id'];?>">
                    <label  class="col-sm-2 control-label">About Us Info  :</label>
                    <div class="col-sm-10">
                      <textarea class="form-control"  name="About_detail" id="About_detail" onkeyup="textAreaAdjust(this)" style="overflow:hidden" placeholder="Write Something About Your Agency....."></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Services You Provide :</label>
                    
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-lg-6">
                      <label class="checkcontainer">Online Payment Option
                          <input type="checkbox" name="Services[]" id="Online_Payment_Option" value="Online Payment Option">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                        <label class="checkcontainer">Ticketing
                          <input type="checkbox" name="Services[]" id="Ticketing" value="Ticketing">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                        <label class="checkcontainer">Car Rental
                          <input type="checkbox" name="Services[]" id="Car_Rental" value="Car Rental">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                        <label class="checkcontainer">Local Transportation
                          <input type="checkbox" name="Services[]" id="Local_Transportation" value="Local Transportation">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                        <label class="checkcontainer">Hotel & Lodging
                          <input type="checkbox" name="Services[]" id="Hotel_&_Lodging" value="Hotel & Lodging">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                        <label class="checkcontainer">MICE Services
                          <input type="checkbox" name="Services[]" id="MICE_Services" value="MICE Services">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                      </div>
                      <div class="col-lg-6">
                        <label class="checkcontainer">Forex Services
                          <input type="checkbox" name="Services[]" id="Forex_Services" value="Forex Services" >
                          <span class="checkcontainercheckmark"></span>
                        </label>
                        <label class="checkcontainer">B2B Services
                          <input type="checkbox" name="Services[]" id="B2B_Services" value="B2B Services">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                        <label class="checkcontainer">Insurance
                          <input type="checkbox" name="Services[]" id="Insurance" value="Insurance">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                        <label class="checkcontainer">Guides
                          <input type="checkbox" name="Services[]" id="Guides" value="Guides">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                        <label class="checkcontainer">Visa Assistance
                          <input type="checkbox" name="Services[]" id="Visa_Assistance" value="Visa Assistance">
                          <span class="checkcontainercheckmark"></span>
                        </label>
                      </div>
                    </div>
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="Submit" name="Add" id="Add" class="btn btn-info btn-default ">Add</button>
                <button type="Reset" class="btn btn-default">Reset</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
<script>
  function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}
  </script>
</body>
</html>