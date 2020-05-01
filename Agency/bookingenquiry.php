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
        Booking
        <small>Enquiry</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.pho"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Booking Enquiry</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="w3-responsive">
            
              <table class="w3-table-all w3-small" id="table">
            <thead>
              <tr class="w3-red">
              <td>#</td>
              <td>Package Name</td>
              <td>Package Type</td>
              <td>Enquiry no</td>
              <td>Enquired By</td>
              <td>Email Id</td>
              <td>Mobile No</td>
              <td>Departure Date</td>
              <td>Adults</td>
              <td>Children</td>
              <td>Comment</td>
              <td>Approve</td>
              <td>Reject</td>
            </tr>
            </thead>
            <tbody>
<?php
$count=1;
$id = $_SESSION["id"];
$Agency_name=$_SESSION["name"];
$sql = "SELECT * FROM `package_enquiry` where Agy_Id = $id";
$result = $conn->query($sql); 
if ($result->num_rows > 0){
    // output data of each row
 while($row = $result->fetch_assoc()) { 
  $P_id = $row['P_id'];
          $Sql_pack_name = "SELECT * FROM packages where P_id ='$P_id'";
          $result_pack_name = mysqli_query($conn,$Sql_pack_name);
          $fetch_pack_name = mysqli_fetch_assoc($result_pack_name); 
          $Package_name = $fetch_pack_name["Package_name"];
   ?>
   <?php
$id_search =$row['Pack_enquiry_id'];
$sql_status ="SELECT Status from `Enquiry_status` where Pack_enquiry_id ='$id_search'";
$result_status = mysqli_query($conn,$sql_status);
$fetch_status = mysqli_fetch_assoc($result_status); 
$status = $fetch_status["Status"];
?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center">
<?php echo $Package_name ?>
</td>
<td align="center">
<?php echo $row['Type']; ?>
</td>
<td align="center">
<?php echo $row['Pack_enquiry_id']; ?>
</td>
<td align="center">
<?php echo $row['Fullname']; ?>
</td>
<td align="center">
<?php echo $row["Email_id"]; ?>
</td>
<td align="center">
<?php echo $row["Mobile_no"]; ?>
</td>
<td align="center">
<?php echo $row["Departure_date"]; ?>
</td>
<td align="center">
<?php echo $row["Adults"]; ?>
</td>
<td align="center">
<?php echo $row["Children"]; ?>
</td>
<td align="center">
<?php echo $row["Comment"]; ?>
</td><?php if($status == 'Approve' OR $status == 'Reject'){?>
  <td colspan="2"><?php echo $status ?></td>
<?php } else{ ?>
<td align="center"> 
<a href="javascript:void(0)" data-toggle="modal" data-target="#Approvemodal" onclick="approve_id(<?php echo $row["Pack_enquiry_id"];?>)">Approve</a>
</td>
<td align="center"> 
<a href="javascript:void(0)" data-toggle="modal" data-target="#Rejectmodal" onclick="reject_id(<?php echo $row["Pack_enquiry_id"];?>)">Reject</a>
</td>
<?php } ?>
</tr>
<?php $count++; }
}
?>

            </tbody>
            </table>
          </div>
      </div>
      <Section>
            <div class="modal fade" id="Approvemodal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Approve Enquiry</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                    <form name="Approveform" id="Approveform" method="Post" align="left"> <!--  onsubmit="return validateForm()" --> 
                    <fieldset>  
                    <strong>
                    <br>
                      <table>
                        <tr>
                        <td><input type="Hidden" name="Pack_enquiry_id" id="Pack_enquiry_id" value=""></td>
                        </tr>
                        <tr>
                        <td>Comment:</td>
                        <td>
                        <textarea id="Comment" name="Comment" style="height:100px;width: 500px; "></textarea>
                        </td>
                        </tr>
                      </table>
                    <br><br>
                    <input type ="Submit" id="approvesubmit" value="Approve"> &nbsp&nbsp
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
        <Section>
            <div class="modal fade" id="Rejectmodal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Reject the Enquiry</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                    <form name="Rejectform" id="Rejectform" method="Post" align="left"> <!--  onsubmit="return validateForm()" --> 
                    <fieldset>  
                    <strong>
                    <br>
                      <table>
                        <tr>
                        <td><input type="Hidden" name="Pack_reject_enquiry_id" id="Pack_reject_enquiry_id" value=""></td>
                        </tr>
                        <tr>
                        <td>Comment:</td>
                        <td>
                <textarea id="Comment_reject" name="Comment_reject" style="height:100px;width: 500px; "></textarea>
                        </td>
                        </tr>
                      </table>
                    <br><br>
                    <input type ="Submit" id="rejectsubmit" value="Reject"> &nbsp&nbsp
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
<script>
function approve_id(id){
  $('#Pack_enquiry_id').val(id);
}
function reject_id(id){
  $('#Pack_reject_enquiry_id').val(id);
}
 $(document).ready(function(){
    $("#approvesubmit").click(function(){
      var id =$('#Pack_enquiry_id').val();
      var Comment =$('#Comment').val();
        passdata={Enquiry_id:id,Commentdata:Comment};
              $.ajax({
                url:"Sql_entry/approve_booking_enquiry.php",
                type: 'post',
                data:passdata,
                success:function(approveresponse){
                  alert(approveresponse);
                }
              });
          });
    $("#rejectsubmit").click(function(){
      var id_reject =$('#Pack_reject_enquiry_id').val();
      alert(id_reject);
      var Reject_comment =$('#Comment_reject').val();
      //alert(Reject_comment);
        passdata1={Reject_enquiry_id:id_reject,Commentdata_reject:Reject_comment};
              $.ajax({
                url:"Sql_entry/reject_booking_enquiry.php",
                type: 'post',
                data:passdata1,
                success:function(rejectresponse){
                  alert(rejectresponse);
                }
              });
          });
      });
        
              
          
    
</script>
</body>
</html>