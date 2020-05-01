<?php include('Includes/header.php');
include('includes/config.php');
if(isset($_POST['Submit']))
{

$Name = $_POST['Name'];
$Email_id = $_POST['Email_id'];
$Subject =  $_POST['Subject'];
$Mpbile_no =  $_POST['Mobile_no'];
$Message =  $_POST['Message'];

$sql="INSERT Into contactsupport(Name,Email_id,Mobile_no,Subject,Message) Values('$Name','$Email_id','$','$Subject','$Message')";
  if ($conn->query($sql) === TRUE) {
      echo "<script type='text/javascript'>alert('**Message Sent** You Will be Responded Shortly');</script>";

  }
}
?>


    <title>Travelers Hub | Contact</title>
    <div class="hero-wrap" style="background-color: Black ; height:100px">
      <div class="overlay"></div>
      <div class="">
       
        </div>
      </div>

		<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span>Mahavir Swami College Of Engineering And Technology, Barthana, Vesu, Surat</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://+918141375747">+918141822757</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:info@travelershub.com">info@travelershub.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="#">Travelershub.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form  name="Contactsupportform" id="Contactsupportform" method="post"  enctype='multipart/form-data'>
              <div class="form-group">
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="Email_id" name="Email_id" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="Mobile_no" name="Mobile_no" placeholder="Your Mobile Nummber">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" Id="Subject" name="Subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea cols="30" rows="7"  id="Message" name="Message" class="form-control" placeholder="Message"></textarea>
              </div>
              <input type ="submit" id="submit" name="Submit" class="btn btn-primary py-3 px-5" value="Send Message">
            </form>
          
          </div>

          <div class="col-md-6" id="map"></div>
        </div>
      </div>
    </section>

<?php include('Includes/footer.php');?>
 </body>
</html>
