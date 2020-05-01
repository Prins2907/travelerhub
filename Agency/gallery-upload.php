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
<?php
     // Declaring Path for uploaded images.
if (isset($_POST['submit'])) {
 $Pack_id =$_POST['Pack_id'];
$imageData = array();
if(isset($_FILES['files'])){
    $errors= array();
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
        $file_name = $_FILES['files']['name'][$key];
        $file_tmp =$_FILES['files']['tmp_name'][$key];
        
        array_push($imageData, $file_name);
       
        $target_path = "Gallery/".$Agency_id."/".$Pack_id."/";
        if(empty($errors)==true){
                          $Pack_id = $_POST['Pack_id'];
                          $Dir1="Gallery/".$Agency_id;
                          if (!file_exists($Dir1) && !is_dir($Dir1)) {
                              mkdir($Dir1);         
                          } 
                          $Dir2="Gallery/".$Agency_id."/".$Pack_id;
                          if (!file_exists($Dir2) && !is_dir($Dir2)) {
                              mkdir($Dir2);         
                          }
                          if(is_dir("$Dir2/".$file_name)==false){
                              move_uploaded_file($file_tmp,$target_path.$file_name);
                          }else{                                  //rename the file if another one exist
                              $new_dir=$target_path.$file_name.time();
                               rename($file_tmp,$new_dir) ;               
                          }
                    
        }
        else{
                print_r($errors);
        }
 }
    if(empty($error)){
    $imgDt = implode("|", $imageData);
     $query="INSERT into gallery_data(Agy_id,P_id,Image_info) VALUES('$Agency_id','$Pack_id','$imgDt'); ";
     
     if ($conn->query($query) === TRUE) {
    echo "<script>alert('Images Uploaded Succesfully');</script>";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}  
  }
}
}
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
            <div class="form-group">
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
              <div class="form-group">
                  <label for="inputPackagename" class="col-sm-2 control-label">Upload Images</label>
                  <div class="col-sm-10">
                    <input type="file"  name="files[]" id="Gallery_images" required multiple="">
                  </div>
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
      var sel = $('#Select_name').val();
      $("#display").show();
      $("#Pack_id").val(sel);
    });
});
</script>
</body>
</html>