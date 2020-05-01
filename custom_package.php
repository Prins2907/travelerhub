<?php 
session_start();
include('Includes/header.php');
include('includes/config.php');
if(strlen($_SESSION['User_name'])==0)
  { 
    header('location:index.php');
  }
$cities="Select * from Cities";
$resultcities = $conn->query($cities);
$pck_category="Select * from Packagecategory";
  $resultcategory = $conn->query($pck_category);

if(isset($_POST['Submit']))
{
$U_id =$_POST['U_id'];
$Name = $_POST['Name'];
$Email_id = $_POST['Email_id'];
$From = $_POST['Search_city'];
$Package_type=$_POST['Search_category'];
$Budget =  $_POST['Budget'];
$Adult=$_POST['Adult'];
$Children=$_POST['Children'];
$Hotel=$_POST['Hotel'];
$Transport=$_POST['Transport'];
$Message =  $_POST['Message'];

$sql_insert="INSERT Into custom_enquiry(U_id,Name,Email_id,Destination,Package_type,Budget,Adults,Children,Hotel,Transportation,Comment) Values('$U_id','$Name','$Email_id','$From','$Package_type','$Budget','$Adult','$Children','$Hotel','$Transport','$Message')";
  if ($conn->query($sql_insert) === TRUE) {
      echo "<script type='text/javascript'>alert('**Message Sent** You Will be Responded Shortly');</script>";
  }
  else{
    echo "Error:" . $sql_insert . "<br>" . $conn->error;
  }
}
?>


    <title>Travelers Hub | Custom Package Enquiry</title>
    <div class="hero-wrap" style="background-color: Black ; height:100px">
      <div class="overlay"></div>
      <div class="">
       
        </div>
      </div>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Custom Package Enquiry</h2>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form  name="Custompackageform" id="Custompackageform" method="post"  enctype='multipart/form-data'>
              <input type="hidden" name="U_id" id="U_id" value="<?php echo $_SESSION['U_id'];?>">
              <div class="form-group">
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="Email_id" name="Email_id" placeholder="Your Email">
              </div>
              <div class="form-group">
               <select name="Search_city" id="Search_city" class="form-control form-default">
                        <option value="">Destination</option>
                        <?php while($rowcities = $resultcities->fetch_assoc()) { ?>
          <option value="<?php echo $rowcities['Ct_id'];?>"><?php echo $rowcities['Ct_name'];?></option>
          <?php }  ?> 
                                            </select>
              </div>
              <div class="form-group">
                <select name="Search_category" id="Search_category" class="form-control" placeholder="Keyword search">
                        <option value="">Category</option> 
                        <?php while($rowcategory = $resultcategory->fetch_assoc()) { ?>
        <option value="<?php echo $rowcategory['Category_name'];?>"><?php echo $rowcategory['Category_name'];?></option>
                              <?php } ?>
                                            </select>
              </div>
              <div class="form-group">
              <input type="text" class="form-control" id="Budget" name="Budget" placeholder="Your Budget Per Person">
              </div>
              <div class="form-group">
              <input type="text" class="form-control" id="Adult" name="Adult" placeholder="Total Adults">
              </div>
              <div class="form-group">
              <input type="text" class="form-control" id="Children" name="Children" placeholder="Total Children">
              </div>
              <div class="form-group">
              <select name="Hotel" id="Hotel" class="form-control" placeholder="Keyword search">
                <option value="Standard">Standard</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Premium">Premium</option>
              </select>
              </div>
              <div class="form-group">
              <select name="Transport" id="Transport" class="form-control" placeholder="Keyword search">
                <option value="Bus">Bus</option>
                <option value="Train">Train</option>
                <option value="Flight">Flight</option>
              </select>
              </div>
              <div class="form-group">
                <textarea cols="30" rows="7"  id="Message" name="Message" class="form-control" placeholder="Comment If any Extra Thing Needed or any other Enquiry"></textarea>
              </div>
              <input type ="submit" id="submit" name="Submit" class="btn btn-primary py-3 px-5" value="Send">
            </form>
          
          </div>

          <div class="col-md-6" id="map"></div>
        </div>
      </div>
    </section>

<?php include('Includes/footer.php');?>
 </body>
</html>
