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
  <title>Agency | Create Package</title>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
<?php 
  if(isset($_POST['Create']))
  {
   if(!session_id()) session_start();
    $Agency_name = $_SESSION["name"];
    $Agency_id = $_SESSION["id"];
    $City_id = $_POST["City_id"];
  //$Agency_id =$_POST["Agy_id"];
  $Package_name=$_POST["Package_name"];
  $Category = $_POST["Packagecategory"];
  $Destination=$_POST["Destination"];
  $Totaldays=$_POST['Duration'];
  $Created_on=$_POST['Created_on']; 
  $Standard=$_POST["Standard"];
  $Deluxe=$_POST["Deluxe"];
  $Premium=$_POST["Premium"];

  if(isset($_POST["destitextbox"]) && is_array($_POST["destitextbox"])){
    $Destinationcover = implode(", ", $_POST["destitextbox"]);
    
}
  if(isset($_POST["textbox"]) && is_array($_POST["textbox"])){
    $Details = implode(", ", $_POST["textbox"]);
    
}
  $Image=$_FILES["packageFile"];
  


  $info = pathinfo($_FILES['packageFile']['name']);
  $ext = $info['extension']; // get the extension of the file
  $newname = $_FILES['packageFile']['name']; 
  // echo "<script type='text/javascript'>alert('$newname');</script>";

  $Dir1="List/".$Agency_name."/".$Destination;
  // echo "<script type='text/javascript'>alert('$Dir1');</script>";
  
  if (!file_exists($Dir1) && !is_dir($Dir1)) {
      mkdir($Dir1);         
  } 

  $Dir2=$Dir1.'/';
  $target = $Dir2.$newname;
  //echo "<script type='text/javascript'>alert('$target');</script>";
  move_uploaded_file( $_FILES['packageFile']['tmp_name'], $target);
    
  $sql1="INSERT Into Packages
  (Agy_id,Ct_id,Package_name,Category,Destination,Duration,
  Created_on,Destinationcover,Standard,Deluxe,Premium,Details,Image)
  Values
  ('$Agency_id','$City_id','$Package_name','$Category','$Destination','$Totaldays',
  '$Created_on','$Destinationcover',
  '$Standard','$Deluxe','$Premium','$Details','$newname')";
  //print_r($sql1) ;

  if (mysqli_query($conn, $sql1) == true) {
    echo "<script type='text/javascript'>alert('New record created successfully');</script>";
    header('location: create-package.php');
  } else {
      return False;
  }
  $conn->close();
  }
  ?>
  <?php
  $id=$_SESSION['id'];
  $Forcityid = "SELECT Ct_id from Agencyregister where Agy_id='$id'";
  $result_city_id = mysqli_query($conn,$Forcityid);
  $fetch_city_id = mysqli_fetch_assoc($result_city_id); 
  $fetch_id = $fetch_city_id["Ct_id"];
      //echo "<script type='text/javascript'>alert('$City_id');</script>";

  $states="Select * from States";
  $resultstates = $conn->query($states);

  $pck_category="Select * from Packagecategory";
  $resultcategory = $conn->query($pck_category);

  $duration ="Select * from days";
  $resultdays=$conn->query($duration);


  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Packages
        <small>Create Package</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Package</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="" class="form-horizontal" method="post" enctype='multipart/form-data'>
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="City_id" id="City_id" value="<?php echo $fetch_id;?>">
                    <label for="inputPackagename" class="col-sm-2 control-label">Package Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="Package_name" id="Package_name" placeholder=" Package Name" required>
                    </div>
                  </div>
                  <div class="form-group" >
                  <!-- <input type="hidden" name="Agy_id" id="Agy_id" value=""> -->
                    <label for="inputPackagename" class="col-sm-2 control-label">Package Category</label>
                    <div class=" col-sm-8">
                      <p id="p1"></p>
                      <select name="Packagecategory" class="form-control" id="Packagecategory" style="width: 40%" >
                      <option value = "" >Package Category</option>
                        <?php if ($resultcategory->num_rows > 0){
                                while($rowcategory = $resultcategory->fetch_assoc()) { ?>
                              <option value="<?php echo $rowcategory['Category_name'];?>"><?php echo $rowcategory['Category_name']; ?>
                            </option>
                              <?php } }?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Destination State</label>
                      <div class="col-sm-8">
                        <select name="Destination"  class="form-control" id="Destination" style="width: 40%" >
                            <option value = "">Select State</option>
                              <?php if ($resultstates->num_rows > 0){
                                    while($rowstates = $resultstates->fetch_assoc()) { ?>
                                  <option value="<?php echo $rowstates['S_name'];?>"><?php echo $rowstates['S_name']; ?>
                              </option>
                                  <?php } } ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Duration </label>
                    <div class="col-sm-8">
                  <select name="Duration" id="Duration" class="form-control" style="width: 40%" >
                      <option value = "">Select</option>
                  <?php
                    while($rowdays = $resultdays->fetch_assoc()) { ?>
                  <option value="<?php echo $rowdays['Day_details'];?>"><?php echo $rowdays['Day_details']; ?>
                </option>
                  <?php } ?>
                        </select>
                    </div>
                  </div>
                  <input type="hidden" name="Created_on" id="Date" value="">

                <div class="form-group">
                    <label for="inputPackagename" class="col-sm-2 control-label">Places Covered</label>
                    <div class="col-sm-10" id='TextBoxesDestinationGroup'>
                      <div>

                      <input type='button' value=' Add ' id='adddestiButton'>
                      <input type='button' value=' Remove ' id='removedestiButton'>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label"> Rates/Person for Package Category :</label>
                    <div class="col-sm-8">
                      <div class="row form-group">
                        <div class="col-sm-2">
                          <label for="focusedinput" class="control-label">Standard</label>
                        </div>
                        <div class="col-sm-6 input-group"><span class="input-group-addon">Rs</span>
                          <input type="text" name="Standard" id="Standard" class="form-control" Value="">
                          <span class="input-group-addon">/-</span>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-2">
                          <label for="focusedinput" class="control-label">Deluxe</label>
                        </div>
                        <div class="col-sm-6 input-group"><span class="input-group-addon">Rs</span>
                          <input type="text" name="Deluxe" id="Deluxe" class="form-control" Value="">
                          <span class="input-group-addon">/-</span>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-2">
                          <label for="focusedinput" class="control-label">Premium</label>
                        </div>
                        <div class="col-sm-6 input-group"><span class="input-group-addon">Rs</span>
                          <input type="text" name="Premium" id="Premium" class="form-control" Value="">
                          <span class="input-group-addon">/-</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Day Details / Itinerary</label>
                    <div class="col-sm-8" id='TextBoxesGroup'>
                      <div class="form-control1">

                      <input type='button' value='Add Description' id='addButton'>
                      <input type='button' value='Remove Description' id='removeButton'>
                      </div>
                    </div>
                </div>                              
                  <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control1" name="packageFile">

                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="Submit" name="Create" id="Create" class="btn btn-info btn-default ">Submit</button>
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
<script type="text/javascript">  
  $(document).ready(function(){
               $( "#Date" ).datepicker( "setDate", new Date());
               /* Adding Itinerary list Text Box And Removing It Dynamically*/
               var counter1 = 1;

      $("#removeButton").hide();
      $("#addButton").click(function () {   
    if(counter1>10){
              alert("Only 10 textboxes allow");
              return false;
    }   
      
    var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'TextBoxDiv' + counter1);
                  
    newTextBoxDiv.after().html('<label>Day '+ counter1 + ' : </label>' +
          '<input type="text" name="textbox[]" id="textbox[]" class="col-sm-6 form-control"   value="" >');
              
    newTextBoxDiv.appendTo("#TextBoxesGroup");

          
    counter1++;
    $("#removeButton").show();
       });

       $("#removeButton").click(function () {
    if(counter1==1){
            alert("No more textbox to remove");
            return false;
         }   
          
    counter1--;
        
          $("#TextBoxDiv" + counter1).remove();
          if(counter1==1){
            $("#removeButton").hide();
         }  

       });
        var counter = 1;

      $("#removedestiButton").hide();
      $("#adddestiButton").click(function () {    
    if(counter>10){
              alert("Only 10 textboxes allow");
              return false;
    }   
      
    var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'TextBoxDestinationDiv' + counter);
                  
    newTextBoxDiv.after().html('<label> Places Visiting To '+ counter + ' : </label>' +
          '<input type="text" name="destitextbox[]" id="destitextbox[]" class="form-control"   value="" >');
              
    newTextBoxDiv.appendTo("#TextBoxesDestinationGroup");

          
    counter++;
    $("#removedestiButton").show();
       });

       $("#removedestiButton").click(function () {
    if(counter==1){
            alert("No more textbox to remove");
            return false;
         }   
          
    counter--;
        
          $("#TextBoxDestinationDiv" + counter).remove();
          if(counter==1){
            $("#removedestiButton").hide();
         }  

       });


  });         
  </script>
  </body>
</html>
