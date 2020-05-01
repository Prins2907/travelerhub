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
  <title>Agency | View Packages</title>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Packages
        <small>View & Manage Pacakage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.pho"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Packages</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="w3-responsive">
            
              <table class="w3-table-all w3-small table-bordered" border="1" id="table">
            <thead>
              <tr class="w3-red">
              <td>#</td>
              <td>Package Name</td>
              <td>Type</td>
              <td>Destination</td>
              <td>Duration</td>
              <td>Places Cover</td>
              <td>Created On</td>
              <td>Last Updated</td>
              <td>Standard Rate</td>
              <td>Deluxe Rate</td>
              <td>Premium Rate</td>
              <td>Day Details</td>
              <td>Image</td>
              <td>Package Details</td>
              <td>Status</td>
              <!-- <td>Action</td> -->
            </tr>
            </thead>
            <tbody>
<?php
$count=1;
$id = $_SESSION["id"];
$Agency_name=$_SESSION["name"];
$sql = "SELECT * FROM Packages where Agy_Id = $id";
$result = $conn->query($sql); 
if ($result->num_rows > 0){
    // output data of each row
 while($row = $result->fetch_assoc()) { ?>
  <?php $State_name = $row["Destination"]; ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center">
<?php echo $row["Package_name"]; ?>
</td>
<td align="center">
<?php echo $row["Category"]; ?>
</td>
<td align="center">
<?php echo $row["Destination"]; ?>
</td>
<td align="center">
<?php echo $row["Duration"]; ?>
</td>
<td align="center">
<?php echo $row["Destinationcover"]; ?>
</td>
<td align="center">
<?php echo $row["Created_on"]; ?>
</td>
<td align="center">
<?php echo $row["Lastupdated"]; ?>
</td>
<td align="center">
<?php echo $row["Standard"]; ?>
</td>
<td align="center">
<?php echo $row["Deluxe"]; ?>
</td>
<td align="center">
<?php echo $row["Premium"]; ?>
</td>
<td align="center"> 
<?php echo $row["Details"]; ?>
</td>
<td align="center">
  <?php $docname = $row["Image"]; 
$pathinfo ="List/".$Agency_name.'/'.$State_name.'/';
$info = $pathinfo.$docname;
?>
<img src="<?php echo $info ?>" style="width:100px; height:100px;">

</td>
<td align="center">
<a href="javascript:void(0)"  data-toggle="modal" data-target="#Detailsmodal"  onclick="details_id(<?php echo $row["P_id"];?>)">Detail</a>
</td>
<td align="center">
<a href="javascript:void(0)"  data-toggle="modal" data-target="#Statuspackmodal"  onclick="status_id(<?php echo $row["P_id"];?>)"><?php echo $row["Status"]; ?></a>


</td>
<!-- <td align="center">
<?php echo "EDIT"; ?>
</td> -->
</tr>
<?php $count++; }
}
?>

            </tbody>
            </table>
          </div>
          <Section>
            <div class="modal fade" id="Detailsmodal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header box box-info">
                <h4 class="modal-title ">Package Details</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                  <section class="content">
      <div >
           

        <form  name="addfeatures" method="post" class="form-horizontal">
        <div class="box-body">
            <div class="form-group">
            <input type="hidden" id="F_id"class="form-control">
            <input type="hidden" id="Agy_id"class="form-control">
            <input type="hidden" id="P_id"class="form-control">

            </div>
          <div class="form-group">
              <label class="col-sm-2 control-label">Standard</label>
              <div class="col-sm-15">
          <div class="row form-group">
            <div class="col-md-4 mb-5">
              <label class="control-label">Inclusion</label>
      <ul id="List_S_inclu"></ul>
            </div>
          
          

            <div class=" col-md-4 mb-5">
              <label class="control-label">Exclusion</label>
              <ul id="List_S_exclu"></ul>
            </div>
          </div>
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Deluxe</label>
              <div class="col-sm-15">
          <div class="row form-group">
            <div class="col-md-4 mb-5">
              <label class="control-label">Inclusion</label>
              <ul id="List_D_inclu"></ul>
            </div>
          
          

            <div class=" col-md-4 mb-5">
              <label class="control-label">Exclusion</label>
              <ul id="List_D_exclu"></ul>
            </div>
          </div>
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Premium</label>
              <div class="col-sm-15">
                  <div class="row form-group">
                      <div class="col-md-4 mb-5">
                        <label class="control-label">Inclusion</label>
                        <ul id="List_P_inclu"></ul>
                      </div>
              
              

                      <div class=" col-md-4 mb-5">
                        <label class="control-label">Exclusion</label>
                       <ul id="List_P_exclu"></ul>
                      </div>
                  </div>
            </div>
          </div>
    </div>    
        </form>

    </div>
    </section>
                    
                </div>
                <div class="modal-footer">
                  <input type="button" name="Add" id="Add"  value="Edit" class="btn btn-info btn-default ">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                
              </div>
            </div>
        </Section>
        <Section>
            <div class="modal fade" id="Statuspackmodal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Status Change</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                    <form name="statusform" id="statusform" method="post" align="left" enctype='multipart/form-data' > <!--  onsubmit="return validateForm()" --> 
                    <fieldset>  
                    <strong>
                    <br>
                      <table>
                        <tr>
                        <td>Name:</td>
                        <td >
                          <input type="text" name="Package_name" id="Package_name" value="" readonly></td>
                        <td><input type="hidden" name="P_id" id="P_id" value=""></td>
                        </tr>
                        <tr>
                        <td>Status:</td>
                        <td><br><br><br><br>  
                          <input type ="Radio" name="Status" value="Activated" >Activated<br>
                          <input type ="Radio" name="Status" value="Deactived">Deactived<br>
                          
                        <p style="color:Red;" id="validation_status"></p>
                        </td>
                        </tr>
                      </table>
                    <br><br>
                    <input type ="Submit" id="changesubmit" value="Update"> &nbsp&nbsp
                    <input type ="Reset" value="Reset">
                    </strong>
                    </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
                
              </div>
            </div>
        </Section>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
<script>
function details_id(id){
            $.ajax({
                   url: 'Sql_entry/Features_details.php',
                   type: 'POST',
                   dataType: "json",
                   data: {id:id},
                   success: function(data){
                     //alert(data['Agency_name']);
                  //console.log(data);
                  $("#F_id").val((data['F_id']));
                   $("#Agy_id").val((data['Agy_id']));
                   $('#P_id').val((data['P_id']));
                   //Standard Inclusion
                   var source = data['Standard_inclusion'];
                   var array = source.split('-');
                   //console.log(array);
                   //console.log(typeof array);
                   var array1 = JSON.stringify(array);
                   //console.log(array1);
                   array1 = array1.replace('[', '');
                   array1 = array1.replace(']', '');
                   array1 = array1.replace(/"/g, ''); 
                   var array2 = array1.split(',');
                   for(var i = 1; i < array2.length; i++) {       
                        $('#List_S_inclu').append($("<li>").text(array2[i]));
                   }

                   //Standard Exclusion
                   var source_s_ex = data['Standard_exclusion'];
                   var array_s_ex = source_s_ex.split('-');
                   var array_s_ex_1 = JSON.stringify(array_s_ex);
                   array_s_ex_1 = array_s_ex_1.replace('[', '');
                   array_s_ex_1 = array_s_ex_1.replace(']', '');
                   array_s_ex_1 = array_s_ex_1.replace(/"/g, ''); 
                   var array_s_ex_2 = array_s_ex_1.split(',');
                   for(var i = 1; i < array_s_ex_2.length; i++) {       
                        $('#List_S_exclu').append($("<li>").text(array_s_ex_2[i]));
                   }
                   //Deluxe  Inclusion
                   var source_d_in = data['Deluxe_inclusion'];
                   var array_d_in = source_d_in.split('-');
                   var array_d_in_1 = JSON.stringify(array_d_in);
                   array_d_in_1 = array_d_in_1.replace('[', '');
                   array_d_in_1 = array_d_in_1.replace(']', '');
                   array_d_in_1 = array_d_in_1.replace(/"/g, ''); 
                   var array_d_in_2 = array_d_in_1.split(',');
                   for(var i = 1; i < array_d_in_2.length; i++) {       
                    $('#List_D_inclu').append($("<li>").text(array_d_in_2[i]));
                   }
                   //Deluxe Exclusion
                   var source_d_ex = data['Deluxe_exclusion'];
                   var array_d_ex = source_d_ex.split('-');
                   var array_d_ex_1 = JSON.stringify(array_d_ex);
                   array_d_ex_1 = array_d_ex_1.replace('[', '');
                   array_d_ex_1 = array_d_ex_1.replace(']', '');
                   array_d_ex_1 = array_d_ex_1.replace(/"/g, ''); 
                   var array_d_ex_2 = array_d_ex_1.split(',');
                   for(var i = 1; i < array_d_ex_2.length; i++) {       
                        $('#List_D_exclu').append($("<li>").text(array_d_ex_2[i]));
                   }
                   //Premium  Inclusion
                   var source_p_in = data['Premium_inclusion'];
                   var array_p_in = source_p_in.split('-');
                   var array_p_in_1 = JSON.stringify(array_p_in);
                   array_p_in_1 = array_p_in_1.replace('[', '');
                   array_p_in_1 = array_p_in_1.replace(']', '');
                   array_p_in_1 = array_p_in_1.replace(/"/g, ''); 
                   var array_p_in_2 = array_p_in_1.split(',');
                   for(var i = 1; i < array_p_in_2.length; i++) {       
                    $('#List_P_inclu').append($("<li>").text(array_p_in_2[i]));
                   }
                   //Premium Exclusion
                   var source_p_ex = data['Premium_exclusion'];
                   var array_p_ex = source_p_ex.split('-');
                   var array_p_ex_1 = JSON.stringify(array_p_ex);
                   array_p_ex_1 = array_p_ex_1.replace('[', '');
                   array_p_ex_1 = array_p_ex_1.replace(']', '');
                   array_p_ex_1 = array_p_ex_1.replace(/"/g, ''); 
                   var array_p_ex_2 = array_p_ex_1.split(',');
                   for(var i = 1; i < array_p_ex_2.length; i++) {       
                        $('#List_P_exclu').append($("<li>").text(array_p_ex_2[i]));
                   }
                    
                $('#Detailsmodal').on('hidden.bs.modal', function () {
 location.reload();
})
                } 

                  });
          }
</script>
<script>
function status_id(id){
  $('#P_id').val(id);
            $.ajax({
                   url: 'Sql_entry/Statusmodal.php',
                   type: 'POST',
                   dataType: "json",
                   data: {id:id},
                   success: function(data){
                     //alert(data['Agency_name']);
                  //console.log(data);
                   $("#Package_name").val((data['Package_name']));
                   } 
                  });
          }
              $(document).ready(function(){
                $("input").focus(function(){
                  $(this).css("background-color", "#cccccc");
                });
                $("input").blur(function(){
                  $(this).css("background-color", "#ffffff");
                });

              // On Clicking Submit Button  
              $("#changesubmit").click(function(){
                //alert("inside Submit");
              if($('input[name=Status]:checked').length<=0)
                {
                 $('#validation_status').text("*Status is Mandantory*");
                 return false;
                }
              else {
                //alert("ELSE");
              var data = $('#statusform').serialize();
              console.log(data);
              $.ajax({
                url:"Sql/Editingstatus.php",
                 dataType: 'json',
                type: 'post',
                data:data,
                success: function(Editresponse){
                  console.log(Editresponse);
                },
                error: function( jqXhr, textStatus, errorThrown ){
                  console.log( errorThrown );
                }
              });
              alert("Status Updated Successfuly!");
              return true;
              }
              });
              });
          
    
</script>
</body>
</html>