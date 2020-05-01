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
        <small>History</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.pho"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Booking History</li>
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
              <td>Enq_id</td>
              <td>Package Name</td>
              <td>Txn Id</td>
              <td>Amount</td>
              <td>Email Id</td>
              <td>Mobile No</td>
              <td>Adult Name</td>
              <td>Adult Gender</td>
              <td>Adult Age</td>
              <td>Children Name</td>
              <td>Children Gender</td>
              <td>Children Age</td>
              <td>Status</td>
            </tr>
            </thead>
            <tbody>
<?php
$count=1;
$id = $_SESSION["id"];
$Agency_name=$_SESSION["name"];
$sql = "SELECT * FROM `booking_status` where Agy_Id = $id";
$result = $conn->query($sql); 
if ($result->num_rows > 0){
    // output data of each row
 while($row = $result->fetch_assoc()) { 
   ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center">
<?php echo $row['Pack_enquiry_id'] ?>
</td>
<td align="center">
<?php echo $row['Product_info']; ?>
</td>
<td align="center">
<?php echo $row['Txn_id']; ?>
</td>
<td align="center">
<?php echo $row['Amount']; ?>
</td>
<td align="center">
<?php echo $row["Email_id"]; ?>
</td>
<td align="center">
<?php echo $row["Mobile_no"]; ?>
</td>
<td align="center">
<?php $array_a_n = explode("-",$row["Adult_name"]);
      $arrlength_a_n= count($array_a_n);
      for($x = 0; $x < $arrlength_a_n; $x++) {
    echo $array_a_n[$x];
    echo "<br>";
} 
 ?>
</td>
<td align="center">
  <?php $array_a_a = explode("-",$row["Adult_age"]);
      $arrlength_a_a= count($array_a_a);
      for($x = 0; $x < $arrlength_a_a; $x++) {
    echo $array_a_a[$x];
    echo "<br>";
} 
 ?>
</td>
<td align="center">
  <?php $array_a_g = explode("-",$row["Adult_gender"]);
      $arrlength_a_g= count($array_a_g);
      for($x = 0; $x < $arrlength_a_g; $x++) {
    echo $array_a_g[$x];
    echo "<br>";
} 
 ?>
</td>
<td align="center">
<?php $array_c_n = explode("-",$row["Children_name"]);
      $arrlength_c_n= count($array_c_n);
      for($x = 0; $x < $arrlength_c_n; $x++) {
    echo $array_c_n[$x];
    echo "<br>";
} 
 ?>
</td>

<td align="center">
  <?php $array_c_a = explode("-",$row["Children_age"]);
      $arrlength_c_a= count($array_c_a);
      for($x = 0; $x < $arrlength_c_a; $x++) {
    echo $array_c_a[$x];
    echo "<br>";
} 
 ?>
</td>

<td align="center">
  <?php $array_c_g = explode("-",$row["Children_gender"]);
      $arrlength_c_g= count($array_c_g);
      for($x = 0; $x < $arrlength_c_g; $x++) {
    echo $array_c_g[$x];
    echo "<br>";
} 
 ?>
</td>
<td align="center">
<?php echo $row["Status"]; ?>
</td>
</tr>
<?php $count++; }
}
?>

            </tbody>
            </table>
          </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>

</body>
</html>