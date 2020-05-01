<?php

  /*require '../mail/PHPMailer.php';
    include '../mail/SMTP.php'; 
  include '../mail/OAuth.php';
    include '../mail/Exception.php';*/
    
$cities="Select * from Cities";
$resultcities = $conn->query($cities);
/*For Displaying State's Name */
$states="Select * from States";
$resultstates = $conn->query($states);
 if(isset($_POST["Loginbutton"]))
  {
    if(!empty($_SESSION['Username'])){
      echo "<script> location.reload();</script>";
    }
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sel = "Select * from userregister where Email_id = '$email' and Password = '$password' and Status = 'Approved'";
      
      $res = mysqli_query($conn,$sel);
      $rowcount=mysqli_num_rows($res);
      if($rowcount>0)
      {
        $ftch = mysqli_fetch_array($res);
        $_SESSION["U_id"] = $ftch["U_id"];
        $_SESSION["User_name"] = $ftch["Full_name"];
        $_SESSION['Email_id']=$ftch['Email_id'];
        $_SESSION['Mobile_no']=$ftch['Mobile_no'];
        $_SESSION['Gender']=$ftch['Gender'];
        $_SESSION['User_image']=$ftch['User_image'];
        $_SESSION['DOB'] =$ftch['DOB'];
      }
      else{
        echo "<script>alert('Invalid Details');</script>";
        } 
    }
    /*User Submit Button*/
    if(isset($_POST["usersubmit"]))
  {
        $Fullname = $_POST["fname"];
        $DOB = $_POST["dob"];
        $Gender = $_POST["gender"];
        $Email_id = $_POST["email"];
        $Password = $_POST["userpassword"];
        $Mobile_no = $_POST["m_no"];
        $City= $_POST["city"]; 


        $sql_user = "INSERT INTO userregister (Full_name,DOB,Gender,
        Email_id,Password,Mobile_no,City)
        VALUES
        ('$Fullname','$DOB','$Gender',
        '$Email_id','$Password','$Mobile_no','$City')";


        if ($conn->query($sql_user) === TRUE) {
          echo "<br>New record created successfully<br>";
          header("Location: ../index.php");
        } else {
          echo "Error: " . $sql_user . "<br>" . $conn->error;
        }

        $Confirmation_Token=substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!()[]{}*"),'0',15);
  
    $insert = "INSERT INTO `temp_master`(`Name`,
                                  `Email`,
                  `Age`,
                                  `Confirmation_Token`
                                        )
                                    VALUES (
                                        '".$Name."',
                                        '".$Email_."',
                                        '".$Full_name."',
                                        '".$Confirmation_Token."'
                                    )";
            
    $query= mysqli_query($conn, $insert);
    
    if($query>0)
    {
    
    $link="http://localhost/New_Folder/Verify_Email.php?e=$Confirmation_Token";
            
            
            
            $content="Hello,<br>
                    ".$Name." <br>
                    you have successfully registered in myappointment.com 
                    <br>
                    ".$Full_name." <br>
                    <font color='red'>Note :- After Admin Approval you have authenticate user for <br>
                    marketplace.com and then after you will login successfully in marketplace.com.<br>
                    <br>
                    </font>
                    thank you for registration.
                    
                    You are required for activate your account for this click on the link which are given below<br>
                    ".$link."";
                      
              
            //require 'mail/PHPMailer.php';
            //$mail = new PHPMailer();
            $mailer = new PHPMailer\PHPMailer\PHPMailer();
            $mailer->IsSMTP();
            $mailer->Host     = "smtp.gmail.com";
            $mailer->Username   = "pintupatel0737@gmail.com";//GMAIL Username
            $mailer->Password   = "pintu2907"; //GMAIL Password
            $mailer->SMTPAuth   = true;  
            $mailer->Port     = 587; 
            $mailer->SMTPSecure   = 'tls'; 
            $mailer->setFrom("pintupatel0737@gmail.com","Prakash patel");
            $mailer->Subject    = "You have successfully registered";
            $mailer->addAddress($Email);
            $mailer->msgHTML($content);
            $mailer->IsHtml(true);
            $mailer->addReplyTo("pintupatel0737@gmail.com");
      
            if($mailer->Send())
            {       
              echo "<script>Alert('Mail Success');</script>";
              
            }
                        else
                        {
                            echo $mailer->ErrorInfo;
                        }

            
    }
 else {
  
       echo "NOt Done";
 }

  }
/*user submit button ends*/
/*Agency sumbit button*/
if(isset($_POST['agencysubmit'])){
    $Agencyname = $_POST["agencyname"];
    $Email_id = $_POST["email_id"];
    $Username = $_POST["username"];
    $Password = $_POST["password"];
    $Contact_no = $_POST["c_no"];
    $State =$_POST["state"];
    $City= $_POST["agencycity"]; 
    $Document= $_POST["hidden"];
    $Logo= $_POST["hidden1"]; 
    $Address= $_POST["address"];

     $sql_agency = "INSERT INTO agencyregister (Agency_name,Email_id,Username,Password,Contact_no,State,City,Document,Logo,Address)
     VALUES('$Agencyname','$Email_id','$Username','$Password','$Contact_no','$State','$City','$Document','$Logo','$Address')";

     
    if ($conn->query($sql_agency) === TRUE) {
        echo "<br>New record created successfully<br>";
    } else {
        echo "Error: " . $sql_agency . "<br>" . $conn->error;
    }
}
/*End of Agency Submit*/  
?>
<SECTION>
    <div id="login-modal" class="modal fade">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">        
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">        
          <div class="form-group">
            <label>Email-Id</label>
            <input type="text" class="form-control" id="email" name="email" required="required">
          </div>
          <div class="form-group">
            <div class="clearfix">
              <label>Password</label>
              <a href="#" class="pull-right text-muted"><small>Forgot?</small></a>
            </div>
            
            <input type="password" class="form-control"  name="password"  required="required">
          </div>
        </div>
        <div class="modal-footer">
          <input type="Submit" class="btn btn-primary pull-right" name="Loginbutton" value="Login" id="Loginbutton">
        </div>
      </form>
    </div>
  </div>
</div>  
  </SECTION>
  <!-- End of Login Modal -->
  <!-- User Modal -->
 
  <div class="modal fade" id="Usermodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form action="" name="userform" id="userform" method="post" align="left" enctype='multipart/form-data' >
        <div class="modal-header">
    <h4 class="modal-title">Sign Up As a User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>    
        </div>  
        <div class="modal-body">

<table>
                <tr>
                  <td>Full Name:</td>
                  <td><input type="text" class="form-control mb-3" name="fname" value="" id="fname" placeholder="Full Name" required></td>                  
                </tr>
                <tr>
                  <td>Date of Birth:</td>
                  <td><input type="date" class="form-control mb-3" id="dob" name="dob" value="" placeholder="Eg: DD/MM/YYYY" required></td>                 
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td class="form-control mb-3">
                          <input type ="Radio"name="gender" id="male "value="Male">Male &nbsp 
                          <input type ="Radio" name="gender" id="female" value="Female" >Female &nbsp
                          <input type ="Radio"  name="gender" id="other" value="Other">Other &nbsp &nbsp &nbsp 
                  </td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td><input  type ="email" name="email" value=""  class="form-control mb-3" id="email" placeholder="abc@xyz.com" required></td>                  
                </tr>
                <tr>
                  <td>Password:</td>
                  <td><input  type ="password" name="userpassword" value=""  class="form-control mb-3" id="userpassword" required></td>                 
                </tr>               
                <tr>
                  <td>Mobile No :</td>
                  <td><input type ="Number" class="form-control mb-3" name="m_no" value="" id="m_no" placeholder="Contact Number" required></td>                  
                </tr> 
                <tr>
                  <td>City:</td>
                  <td>
                    <select id="city" name="city" class="form-control mb-3">
           <option value="">Select City</option>  
          <?php while($rowcities = $resultcities->fetch_assoc()) { ?>
          <option value="<?php echo $rowcities['Ct_id']; ?>"><?php echo $rowcities['Ct_name']; ?></option>
          <?php }  ?>       
                  </select>
                </td>
                </tr>
                <tr>   
                <td><input type="Submit" id="usersubmit" class="btn-primary btn" name="Submit"></td>
                <td><input type="reset" class="btn-inverse btn" Value="Reset"></td>
                </tr>
                      
</table>
        </div>
      </form>
      </div> 
    </div>
  </div>
 
    
  <!-- End of USER REGISTRATION MODAL SECTION -->
  
  <!-- AGENCY REGISTRATION MODAL SECTION -->
  <!-- Modal content-->
  <div class="modal fade" id="Agencymodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="post"  name="agencyform" id="agencyform" align="left" enctype='multipart/form-data' >
        <div class="modal-header">
    <h4 class="modal-title">Sign Up As a Agency</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
              <table>
                <tr>
                  <td>Agency Name :</td>
                  <td><input type="text" class="form-control mb-3" name="agencyname" id="agencyname" placeholder="Name of the Agency" required></td>                  
                </tr>
                <tr>
                  <td>Email Id :</td>
                  <td><input type="email" class="form-control mb-3" name="email_id" id="email_id" placeholder="Eg: abc@gmail.com" required></td>                  
                </tr>
                <tr>
                  <td>Username :</td>
                  <td><input type="text" class="form-control mb-3" name="username" id="username" placeholder="Enter the Username" required></td>                  
                </tr>
                <tr>
                  <td>Password :</td>
                  <td><input type="password" class="form-control mb-3" name="password" id="password" placeholder="Enter Password" required></td>                  
                </tr> 
                <tr>
                  <td>Contact No :</td>
                  <td><input type="text" class="form-control mb-3" name="c_no" id="c_no" placeholder="Contact Number" required></td>                  
                </tr> 
                <tr>
                  <td>State :</td>
                  <td>
                    <select id="state" name="state" class="form-control mb-3">
           <option value="">Select State</option>  
          <?php while($rowstates = $resultstates->fetch_assoc()) { ?>
          <option value="<?php echo $rowstates['S_name']; ?>"><?php echo $rowstates['S_name']; ?></option>
          <?php }  ?>       
                  </select></td>                  
                </tr>
                <tr>
                  <td>City :</td>
                  <td>
                    <select id="agencycity" name="agencycity" class="form-control mb-3">
          <option>Select State First</option>
                  </select></td>                  
                </tr>
                <tr>
                  <td>Proof Document :</td>
                  <td><input type="file" class="form-control mb-3 file" name="proofpic"  id="fileToUpload"></td>
                  <td><input type="hidden" name="hidden" id="hidden" class="hidden" value=""></td>
                </tr>
                <tr>
                  <td>Agency Logo :</td>
                  <td><input type="file" class="form-control mb-3 file1" name="logopic"  id="logofileToUpload"></td>
                  <td><input type="hidden" name="hidden1" id="hidden1" class="hidden1" value=""></td>

                </tr>
                <tr>
                  <td>Address :</td>
                  <td><textarea class="form-control mb-3" name="address" id="address" placeholder="Agency Registered Address" required></textarea></td>                 
                </tr>
                <tr>
                <td><input type="Submit" id="agencysubmit" class="btn-primary btn" value="Submit"></td>
                <td><input type="reset" class="btn-inverse btn" Value="Reset"></td>
                </tr>
              </table>        
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
</form>
      </div>
      
    </div>
  </div>
  
 