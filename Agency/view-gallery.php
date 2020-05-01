<?php 
session_start();
  if(strlen($_SESSION['name'])==0)
  { 
    header('location:index.php');
  } 
?>
<?php include('includes/config.php');?>
<?php
 $Agency_id=$_SESSION["id"];
 $Agy_Name=$_SESSION["name"];
$sql_name="SELECT * from packages Where Agy_id='$Agency_id'";
$result_name=$conn->query($sql_name);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agency | Gallery Upload </title>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gallery Upload
        <small>Manage & Uplaod Gallery</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.pho"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Gallery</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Features to Packages</h3>
            </div>

        <form  name="addfeatures" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group" id="Div_option">
              <label class="col-md-2 control-label">Select Package Name For Image Gallery</label>
              <div class="col-md-8">
                <div class="input-group">
                   <input type="hidden" name="Pack_id" id="Pack_id" value="">
                 <select Name="Select_name" id="Select_name" Class="form-control" >
                  <option value = "" >Select Package Name</option>
                        <?php 
                                while($row_name = $result_name->fetch_assoc()) { ?>
                              <option value="<?php echo $row_name['P_id']; ?>"><?php echo $row_name['Package_name']; ?>
                            </option>
                              <?php } ?>
                        </select>  
                        
                </div>
              </div>
            </div> 
            <div name="display" id="display">


            </div>  
          </div>
      </div>
            <div class="box-footer">
                <button type="Submit" name="submit" id="submit" class="btn btn-info btn-default ">Submit</button>
                <button type="Reset" class="btn btn-default">Reset</button>

              </div>
        </form>
    </div>

          </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
<script type="text/javascript">
  var abc = 0;      // Declaring and defining global increment variable.
$(document).ready(function() {
  $("#display").hide();
    $("#Select_name").change(function(){
      Selected_id = $('#Select_name').val();
       $("#Div_option").hide();
       $("#display").show();
       passdata = {package_id:Selected_id};
        $.ajax({
          url:"Sql_entry/display_images.php",
          data:passdata,
          type:"post",
          success:function(response){
            //alert(response);
            $('#display').html(response);
          }
        })
      //$("#Pack_id").val(Selected_id);
      
    });
});
</script>
</body>
</html>