
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="js/popper.min.js">
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>

     <!--<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">-->

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="includes/loginmodal.css">


    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

  <link rel="stylesheet" href="Agency/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">Travelers Hub</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
         
          <!--<li class="nav-item"><a href="Traveltips.html" class="nav-link">Travel Tips</a></li>-->
          <li class="nav-item"><a href="Agencylist.php" class="nav-link">Agency</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact-Us</a></li>
           <?php if (!empty($_SESSION['User_name'])) { ?>
            <li class="nav-item"><a href="custom_package.php" class="nav-link">Custom-Package</a></li>
            <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['User_name'];?><span class="caret"></span></a>
            <div class="dropdown-menu" >
          <a href="user_profile.php"  class="dropdown-item">My Profile</a>
            
            <!-- Modal -->

          <a href="user_changepassword.php" class="dropdown-item">Change Password</a>
       </div>
           </li>
             <li class="nav-item"><a href="Logoutindex.php" class="nav-link">Log-Out</a></li> 

          <?php }
          else { ?>
           <li class="nav-item dropdown"><a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Sign Up  <span class="caret"></span></a>
            <div class="dropdown-menu" style="background-color: rgba(0,0,255,0.1);">
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#Usermodal">USER</a>
            
            <!-- Modal -->

          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#Agencymodal">AGENCY</a>
       </div>
           </li>
             <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#login-modal">Sign In</a></li>
             <?php } ?> 
    </ul>
      </div>
    </div>
  </nav>
  
  