<?php 
include('Includes/config.php');
session_start();
include('Includes/header.php');
?>
 <title>Agency Information | Travelers Hub</title>
 <style type="text/css">
 .Validation_modal{
  color: Red;
  font-weight: bold;
 }
 form .stars {
  background: url("stars.png") repeat-x 0 0;
  width: 150px;
  margin: 0 auto;
}
 
form .stars input[type="radio"] {
  position: absolute;
  opacity: 0;
  filter: alpha(opacity=0);
}
form .stars input[type="radio"].star-5:checked ~ span {
  width: 100%;
}
form .stars input[type="radio"].star-4:checked ~ span {
  width: 80%;
}
form .stars input[type="radio"].star-3:checked ~ span {
  width: 60%;
}
form .stars input[type="radio"].star-2:checked ~ span {
  width: 40%;
}
form .stars input[type="radio"].star-1:checked ~ span {
  width: 20%;
}
form .stars label {
  display: block;
  width: 30px;
  height: 30px;
  margin: 0!important;
  padding: 0!important;
  text-indent: -999em;
  float: left;
  position: relative;
  z-index: 10;
  background: transparent!important;
  cursor: pointer;
}
form .stars label:hover ~ span {
  background-position: 0 -30px;
}
form .stars label.star-5:hover ~ span {
  width: 100% !important;
}
form .stars label.star-4:hover ~ span {
  width: 80% !important;
}
form .stars label.star-3:hover ~ span {
  width: 60% !important;
}
form .stars label.star-2:hover ~ span {
  width: 40% !important;
}
form .stars label.star-1:hover ~ span {
  width: 20% !important;
}
form .stars span {
  display: block;
  width: 0;
  position: relative;
  top: 0;
  left: 0;
  height: 30px;
  background: url("stars.png") repeat-x 0 -60px;
  -webkit-transition: -webkit-width 0.5s;
  -moz-transition: -moz-width 0.5s;
  -ms-transition: -ms-width 0.5s;
  -o-transition: -o-width 0.5s;
  transition: width 0.5s;
}
 .topnav {
  background-color: #333;
  overflow: hidden;
}
/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.m_bg1{
	background-color:white;
}
.ww33a {
    width: 25%;
}
.c6 {
    color: #666;
}
.f20 {
    font-size: 20px;
}
.fl {
    float: left;
}
.c3 {
    color: #333;
}
.main_container {
    margin: 60px auto 20px;
}
.p10 {
    padding: 10px;
}
.pare_li {
    font-size: 16px;
}
.bg_cont {
    background: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 0 5px rgba(0,0,0,.13);
}
.bg_cont, .story_img {
    position: relative;
}
.mt2 {
    margin-top: 20px;
}
.bb1 {
    border-bottom: 1px solid #ececec;
}
 .cl {
    clear: both;
}
.p5 {
    padding: 5px;
}
.f17 {
    font-size: 17px;
}

.card_list {
    box-shadow: 0 2px 8px 0 rgba(0,0,0,.2);
    transition: .3s;
    margin-bottom: 10px;
    border-radius: 4px;
    min-height: 140px;
}
.wh70percent {
    width: 70%;
}
.f12 {
    font-size: 12px;
}
.b {
    font-weight: 700;
}

.ml1 {
    margin-left: 10px;
}
.mt1 {
    margin-top: 10px;
}
.a-lin, .a-lin:hover, .book_enq_btn, .btn-s3, .btn-s3a, .btn-s4, .btn-s5, .button_2, .ch_place a, .j_btn1, .nav_mnu1 li a, .show-menu {
    text-decoration: none;
}
.wh90percent{
width: 100%; 
}
.p5 { 
padding: 5px;
} 
.f13 {
font-size: 13px;
} 
.w_lt {
    width: 66.6667%;
}
.w_rt {
    width: 33.3333%;
}

.mt {
    margin-top: 5px;
}
.lis_titl_sm {
max-width: 250px;
}
.f12 {
font-size: 12px;
}
.cl_g {
color: green;
}
.wh30percent {
width: 30%;
}
.bg_f9 {
    background-color: #f9f9f9;
}
.mr1 {
    margin-right: 10px;
}
.c_ba {
    color: #06c;
}
.f11 {
    font-size: 11px;
}
.f20 {
    font-size: 20px;
}
.f60 {
    font-size: 60px;
}
.w33 {
    width: 33.33%;
}
.p_r {
    position: relative;
}
.sr-only {
    width: 100%;
    height: 44px;
    padding: 0;
    margin: 1px;
    border: 0;
    left: 20px;
    text-align: left;
}
.progress {
    height: 20px;
    margin-bottom: 10px;
    background-color: #f5f5f5;
    border-radius: 0;
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
}
.progress-bar {
    float: left;
    width: 0;
    height: 100%;
    font-size: 12px;
    color: #fff;
    text-align: center;
    background-color: #428bca;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
}
.progress-striped .progress-bar, .progress-striped .progress-bar-success {
    background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
}
.progress-striped .progress-bar {
    background-size: 40px 40px;
}
.progress-bar-success {
    background-color: #9ad491;
}
.wh50percent {
    width: 50%;
}
.wh10percent {
    width: 10%;
}
.pagi_n, .tx-rc {
    text-align: right;
}
.p_abs, .pck_nam, .sr-only, .tip-arrow {
    position: absolute;
}
.f_reviw {
    background-color: #fa9324;
    padding: 5px 50px 5px 10px;
    border-radius: 0 0 10px;
}
.c_rating {
    padding: 8px;
    border-radius: 30px;
    box-shadow: 2px 1px 2px 1px #c3c3c3;
}
.lh24 {
    line-height: 24px;
}
.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align:right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
 </style>
 <?php
 /*Getting Detail about the agency that is requested*/
$Agency_requested_id= $_REQUEST['id'];
$sqlagencydetails="SELECT * from agencyregister where Agy_id='$Agency_requested_id'";
$res_agencydetails = mysqli_query($conn,$sqlagencydetails);
$fetch_agencydetails = mysqli_fetch_assoc($res_agencydetails); 
$agencyname = $fetch_agencydetails["Agency_name"];
$url=rawurlencode($agencyname);
/*For Printing the Packages*/
$sqltotalpackages="SELECT * from packages where Agy_id='$Agency_requested_id'";
$restotalpackages=mysqli_query($conn,$sqltotalpackages);
$totalpackages=mysqli_num_rows($restotalpackages);
/*For Rating */
$sqltotalpackages_rating = "SELECT distinct Destination from packages where Agy_id='$Agency_requested_id'";
$restotalpackages_rating=mysqli_query($conn,$sqltotalpackages_rating);
 ?>
 <?php include('Includes/modals.php');?>
    <div class="hero-wrap" style="background-color: Black ; height:100px">
      </div>
       
            <div class="m_bg1"> 
      	<div  style="margin-top:55px"> 
      		<div align="center">
      			<img alt="" src="Logo/<?php echo $fetch_agencydetails['Logo'];?>" style="background-color:#fff; border-radius:2px;height:200px;width: 300px; margin-bottom:8px" class="loading"> 
      		</div> 
      		<div align="center"> <h1 style="margin-top:0; padding:0"><?php echo $agencyname;?></h1>
      	 
      		 <span class="c1 f14"><?php echo $fetch_agencydetails['Address'].", ".$fetch_agencydetails['State'];?></span> 
      		<!--  <div class="mt"> <img src="https://www.hlimg.com/images/4_5star.png" width="150" alt="" class="loading" data-was-processed="true"> 
      		 </div>  -->
      		 <div>Member since 2008</div>
      		  </div>
      		   <div> <br>
      		   	<div align="center">
      		   		<button class="btn btn-default" style="background-color:#fa9324;color:#fff;height:50px;width:200px" name="add review"  <?php if (!empty($_SESSION['User_name'])) { ?> data-toggle="modal" data-target="#Reviewmodal"
                  <?php } else { ?> data-toggle="modal" data-target="#login-modal"
                    <?php } ?> >ADD REVIEW</button>
      		   	 </div>
      		   	</div> 
  </div>
     <hr>
          		<div class="main_container p10" style="margin:0 auto; padding-top:0px">
      	<div align="center"> <a>
      		<div class="fl f20 c6 ww33a mt2"><span class="c3 ff40"> 3.0</span> <img src="images/smallrating-3.png" alt="" class="loading"> <br> Ratings</div></a> <a href="fcp_reviews.php?id=50566">
      			<div class="fl f20 c6 ww33a mt2"> <span class="c3 ff40">  6</span><br>  Reviews  
      		</div></a>
      		<a><div class="fl f20 c6 ww33a mt2"> <span class="c3 ff40"><?php echo $totalpackages;?></span><br> Packages </div></a> <div class="fl f20 c6 ww33a mt2"> <span class="c3 ff40">100% </span><br> Response rate </div>
      </div>
     </div>
		       
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar ftco-animate">      	
        		<div class="sidebar-wrap bg-light ftco-animate">
        			<h3 class="heading mb-4">Contact Details</h3>
              <form>
                <div class="form-group">
                  <p><span style="font-weight: bold; font-size: 15px">Name : </span><?php echo $fetch_agencydetails['Agency_name'];?></p>
                  <p><span style="font-weight: bold; font-size: 15px">Telephone : </span><?php echo $fetch_agencydetails['Contact_no'];?></p>
                  <p><span style="font-weight: bold; font-size: 15px">Email ID : </span><?php echo $fetch_agencydetails['Email_id'];?></p>
                  <p><span style="font-weight: bold; font-size: 15px">Address : </span><?php echo $fetch_agencydetails['Address'].',  '.$fetch_agencydetails['State'];?></p>
                   <?php
                    $cityid = $fetch_agencydetails['Ct_id'];
                    $sqlcityname="SELECT `Ct_name` from Cities where Ct_id = $cityid";
                    $res_city_name = mysqli_query($conn,$sqlcityname);
                    $fetch_city_name = mysqli_fetch_assoc($res_city_name); 
                    $cityname = $fetch_city_name["Ct_name"];

                    ?><p><span style="font-weight: bold; font-size: 15px">Map Location : </span></p>
                 <iframe src="https://www.google.com/maps?q=<?php echo $url.', '.$fetch_agencydetails['Address'].', '.$cityname.', '.$fetch_agencydetails['State'];?>&output=embed"  width="200" height="100" frameborder="2" style="border:groove; border: 1px groove grey;">
                   
                 </iframe>
                </div>
              </form>
        		</div>
          </div>
         
          <div class="col-lg-9">
          	<div class="row">
          		<div class="topnav" style="width: 100%">
				  <a class="active" href="#home">Home</a>
				  <a href="#news">Packages</a>
				  <a href="#contact">Announcements</a>
				  <a href="">Reviews</a>
				  <a href="#about">About Us</a>
				</div>
					 <div class="bg_cont pare_li"  style="width: 100%">
					 	
					 		<div class="f16 p10 bb1">
			 				Packages By<h4 style="font-size: 20px ">"<?php echo $agencyname;?>"</h4>	
			 	
			 		<div class="bg_cont mt2">
			 			
			 			<div class="cl"></div>
			 			
			 				<?php $counter=0; 
			 				while($rowtotalpackages = $restotalpackages->fetch_assoc()) { 
			 					$counter+=1;
			 		if($counter>4){
			 			break;
			 		}
			 		$path="Agency/List/".$agencyname."/".$rowtotalpackages['Destination']."/".$rowtotalpackages['Image'];


        ?>
	 				<div class="p5 fl w50 heightmanagement"><br> 
	 					<div class="card_list bgl" style="min-height:auto;margin-bottom:0"> 
	 						<div class="wh70percent fl">
	 						 <div class="wh40percent fl p_r"> 
	 						 	<div style="display:block"> 
	 						 		<img alt="" style="height: 100px;width: 150px" class="pl_wimg img_ht loaded" src="<?php echo $path;?>"></div>
	 						 	</div>
	 						 	 <div class="wh90percent fl p5 f13">
	 						 	  <div class="lis_titl_sm"><?php echo$rowtotalpackages['Package_name'];?></div> 
							<div class="lis_titl_sm"><span class="f12"><?php echo$rowtotalpackages['Destination'];?></span> 
	 						 	  <div class="cl"></div> 
	 						 	</div><div><span class="c6"><?php echo$rowtotalpackages['Duration'];?></span></div> <div class="cl_g f16" style="padding-bottom:5px">Basic : ₹&nbsp;<?php echo$rowtotalpackages['Standard'];?><sup>*</sup>
	 						 	   </div>
	 						 	    </div> <div class="cl">
	 						 	  </div>
	 						 	</div> <br>
	 						 	 <div class="wh30percent fl p5" align="center">
	 						 	 	<div class="fl w_rt mt" align="right"><button style="padding:3px 5px;cursor:pointer; margin-top:5px; width: 70px;" class="btn-s3 mt fr ml1 btn-danger">Plan</button> 
  </div>
	 						 	 </div> 
	 						 	 <div class="cl">
	 						 	 	
	 						 	 </div>
	 					</div>
	 				</div>
			 				<?php } ?>
			 			

			 		</div>
					 		
					 	</div><!-- Cards  -->

<div class="p10 mt2" align="right"><a href="fcp_announcement.php?id=54537" class="btn btn-info">View all</a></div>
<!-- Annoucements -->
<div id="">
 <h3 class="f20 mt1 ml1 b">Announcements &amp; Offers</h3> 
 <div class="mt p10 ml1 mr1 bb1 bg_f9"> <div class="fl w_lt"> 
 	<span class="c_ba">We are under top agent in India. Just try our services once.</span><br>
 	<span class="c6 f11"> 6 May 2018 10:42</span> 
 </div> 
 <div class="fl w_rt mt" align="right"><button style="padding:3px 5px;cursor:pointer; margin-top:5px;" class="btn-s3 mt fr ml1 btn-danger">Enquire</button> 
  </div>
   <div class="cl"></div>
  </div>
   <div class="p10 mt2" align="right"><a href="fcp_announcement.php?id=54537" class="btn btn-info">View all</a></div> 
</div>
<!--End of Accouments  -->
<div id=""> <h3 class="f20 mt1 ml1 b">Reviews</h3>
 <div class="mt2 p10">  
  <div class="fl w_lt p_r"> 
    <span class="heading">User Rating</span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<p>4.1 average based on 254 reviews.</p>
<hr style="border:3px solid #f1f1f1">

              <div class="side">
                <div>5 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-5"></div>
                </div>
              </div>
              <div class="side right">
                <div>150</div>
              </div>
              <div class="side">
                <div>4 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-4"></div>
                </div>
              </div>
              <div class="side right">
                <div>63</div>
              </div>
              <div class="side">
                <div>3 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-3"></div>
                </div>
              </div>
              <div class="side right">
                <div>15</div>
              </div>
              <div class="side">
                <div>2 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-2"></div>
                </div>
              </div>
              <div class="side right">
                <div>6</div>
              </div>
              <div class="side">
                <div>1 star</div>
              </div>
              <div class="middle">
                <div class="bar-container">
                  <div class="bar-1"></div>
                </div>
              </div>
              <div class="side right">
                <div>20</div>
              </div>
              </div>
               <div class="cl"></div>
                <div class="mt2 ml1 mr1" style="box-shadow:2px 1px 2px 1px #c3c3c3; padding:7px 0;"> 
                  <span class="c1 f20 b f_reviw">Favourite Review</span>
                   <div class="p10 mt1" id=""> 
                    <div class="fl w_lt"> <span class="fl"></span> <span class="fl ml1">
							by <br> <span class="c6">from Delhi, India</span><br> <img alt="" src="https://www.hlimg.com/images/smallrating-5.png" class="loading" data-was-processed="true"> </span> 
            </div> 
            <div class="fl w_rt c9 tx-rc f12">5 December 2018</div> 
              <div class="cl"></div> 
                  <div class="lh24 mt1"> <span class="cl_g">Visited : Dandeli</span><br> <span class="c9">first of all, thanks to supreme travelers for making my trip to kerala - god's own country very memorable during 3rd week of november.. when i planned my tour to kerala, i went through various option but the offer by supreme traveler in their website was irresistible. i contacted them and within no time received a call from mr. george. he assisted me in planning the tour and offered varied option without any hesitation. he was always ready to answer any query from my side. thanks nivedita ma'am.</span> 
                  </div>
               <div class="cl"></div>
                </div>
                </div>
                      <!-- Review Listing -->
                         <br>
                         <h3 class="f20 mt3 ml1">Reviews of <strong><?php echo$agencyname;?></strong></h3> 
                         <div class="p10 bb02" id="focus4915254"> 
                          <div class="fl w_lt"> <span class="fl"><img src="images/rating_user.png" width="60" height="60"></span> <span class="fl ml1">by newuser<br> <span class="c6">from Delhi, India</span><br> <img alt="" src="images/smallrating-5.png"></span> 
                          </div>
                          <div class="fl w_rt c9 tx-rc f12"> 24 January 2019</div> <div class="cl"></div> 
                          <div class="lh24 mt1"> <span class="cl_g">Visited :  Mysore, Mysore</span><br> <span class="c9">i arrived one day early for a business trip in mysore and decided to do this day trip to get the most of the visit. i knew that i'd be either inside an office building or out to dinner with colleagues for most of my visit. thanks you supreme travelers.</span> </div> 
                          <div class="cl"></div> 
                        </div>
                         <div class="line5"></div>
                          <div class="p10 bb02" id="focus4963442"> 
                            <div class="fl w_lt"><span class="fl"><img src="images/rating_user.png" width="60" height="60"></span> <span class="fl ml1">by abhishes4fyui<br> <span class="c6">from Delhi, India</span><br> <img alt="" src="images/smallrating-5.png"> </span>
                             </div> 
                             <div class="fl w_rt c9 tx-rc f12"> 23 January 2019</div>
                              <div class="cl"></div>
                               <div class="lh24 mt1"> <span class="cl_g">Visited : Goa, Goa</span><br> <span class="c9">we have booked 2 days tour packages with pic and drop facilities. driver was good and well. hotel not well but clean and available food facilities. our trip was great and we enjoyed lot of over there.  </span> </div>
                                <div class="cl"></div>
                                 </div>
                           <div class="line5"></div>
                            <div class="p10 bb02" id="focus4931959">
                            <div class="fl w_lt"><span class="fl"><img src="images/rating_user.png" width="60" height="60"></span> <span class="fl ml1">by Imran<br> <span class="c6">from Moradabad, India</span><br> <img alt="" src="images/smallrating-5.png"> </span>
                            </div>
                            <div class="fl w_rt c9 tx-rc f12"> 12 January 2019</div>
                             <div class="cl"></div> <div class="lh24 mt1"> <span class="cl_g">Visited : Dandeli , Dandeli
                             </span><br> <span class="c9">hey guise we had booked my trip with supreme travelers and we enjoyed lot of over there. driver was not well experience and well behaved. hotel condition were good but food available only veg and non veg. no chines food and we have provide outside the hotel thats good one. thanks you </span> </div> <div class="cl"></div> </div> <div class="line5"></div> </div> <div class="p10 mt2" align="right"><a href="fcp_reviews.php?id=54537" class="btn btn-info">View all</a> 
                             </div> 
                           </div><!-- End of Review Home Active -->                       
      <?php    
  $sql_about_us_print = "SELECT * from aboutus where Agy_id = '$Agency_requested_id'";
  $res_about_us_print = mysqli_query($conn,$sql_about_us_print);
  $fetch_about_us_print= mysqli_fetch_array($res_about_us_print);
  $array_services = $fetch_about_us_print['Services'];
  $services =explode(", ", $array_services); 
  ?>
                           <!-- About Us Home Active -->
                           <div id=""> <h3 class="f20 mt3 ml1 b">About <?php echo $agencyname;?></h3>
                            <div class="lh24 p10 c6" style="padding-top:0">
                                <?php echo $fetch_about_us_print['About_detail'];?>
                                  </div> <div class="mt1 ml1 f16">Deals In </div> <div class="p10 c6 lh24">
<?php
foreach ($services as $val) { ?>
  <div class="fl w50"><ul>
   <?php echo "<li>".$val."</li"; ?> 
    </ul>
    <br>
  </div>
<?php
}
?>
   <div class="cl"></div> </div> <div class="p10" align="right"><a href="fcp_aboutus.php?id=54537" class=" btn btn-info">View all</a></div> <br><br> </div>
                           <!-- End of About us Home Active -->

 					 </div>


		    </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
     <!-- Modal For Review  -->
          <Section>
            <div class="modal fade" id="Reviewmodal" role="dialog">
              <div class="modal-dialog modal-lg">
              
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header box box-info" style="background-color:#4A76ED">
                <h4 class="modal-title">Review & Rating</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                  <section class="content">
      <div >
           

        <form  name="Review_rating_form" id="Review_rating_form" method="post" class="form-horizontal">
        <div class="box-body">
                  <input type="hidden" name="Agy_id" id="Agy_id" value="<?php echo $Agency_requested_id;?>" readonly>
                  <input type="hidden" name="User_id" id="User_id" value="<?php echo $_SESSION['U_id'];?>"readonly>
                  <input type="hidden" name="Email_id" id="Email_id" value="<?php echo $_SESSION['Email_id'];?>"readonly>

                  <div class="row">
                      <div class="col-lg-4">
                      <label style="font-size: 18px; padding-top: 10px">Visited : </label>
                    </div>
                    <div class="col-lg-7"><p id="vali_Visited" class="Validation_modal"></p>
                      <SELECT class="form-control" name="Visited" id="Visited">
                        <option value="">State Visited</option>
                          <?php 
                            while($rowtotalpackages_rating = $restotalpackages_rating->fetch_assoc()) { ?>
              <option value="<?php echo $rowtotalpackages_rating['Destination'];?>"><?php echo $rowtotalpackages_rating['Destination'];?>
                            </option>
                              <?php } ?>
          </SELECT> 
                    
                  </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-4">
                      <label style="font-size: 18px; padding-top: 10px">Your Rating : </label>
                    </div>
                    <div class="col-lg-2" style="padding-top: 15px">
                       <div class="stars">
                      <input type="radio" name="star" class="star-1" id="star-1" value="1" />
                      <label class="star-1" for="star-1">1</label>
                      <input type="radio" name="star" class="star-2" id="star-2" value="2"/>
                      <label class="star-2" for="star-2">2</label>
                      <input type="radio" name="star" class="star-3" id="star-3" value="3" />
                      <label class="star-3" for="star-3">3</label>
                      <input type="radio" name="star" class="star-4" id="star-4" value="4" />
                      <label class="star-4" for="star-4">4</label>
                      <input type="radio" name="star" class="star-5" id="star-5"  value="5"/>
                      <label class="star-5" for="star-5">5</label>
                      <span></span>
                        </div>    
                    <p id="vali_star" class="Validation_modal"></p>
                  </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-4">
                      <label style="font-size:18px; padding-top: 10px">Comment : </label>
                    </div>
                    <div class="col-lg-7" style="padding-top: 10px">
                      <p id="vali_comment" class="Validation_modal"></p>
                      <textarea class="form-control" id="Comment" name="Comment" onkeyup="textAreaAdjust(this)" style="overflow:hidden" placeholder="Write Something About Agency....."></textarea>
                    </div>
                  </div>
                </div>
        </form>

    </div>
    </section>
                    
                </div>
                <div class="modal-footer">
                  <button type="Submit" name="Rate" id="Rate" class="btn btn-primary">Submit</button>
                </div>
                </div>
                
              </div>
            </div>
        </Section>
	<?php include('Includes/footer.php');?>
	<script>
     function textAreaAdjust(o) {
  o.style.height = "1px";
  o.style.height = (25+o.scrollHeight)+"px";
}
		$( document ).ready(function() { 
      $('#Reviewmodal').on('hidden.bs.modal', function () {
 location.reload();
})
        $("textarea").height( $("textarea")[0].scrollHeight );
		var heights = $(".heightmanagement").map(function() {
        return $(this).width();
    }).get(),

    maxHeight = Math.max.apply(null, heights);

    $(".heightmanagement").width(maxHeight);
    $('input[type="radio"]').click(function(){
      var inputstar = '** '+ $(this).attr("value") + ' Star Rated';
      $('#vali_star').text(inputstar);
    })
    $("#Rate").click(function(){
              var Comment =$('#Comment').val();
              var Visited = $('#Visited option:selected').val();
            if(Visited == "")
            {
              $('#vali_Visited').text("*Select State Visited")
              return false;
            }
            else if($('input[name=star]:checked').length<=0)
            {
                $('#vali_star').text("*Rate Agency");
                return false;
            }
            else if(Comment.length == 0){
              $('#vali_comment').text('*Write Comment about Agency');
            }
            else{
                  var data = $('#Review_rating_form').serialize();
                  console.log(data);
                  $.ajax({
                      url:"Sql_entry/Ratingdata.php",
                      type: 'post',
                      data:data,
                      success: function(Ratingresponse){
                        //alert(Ratingresponse);
                          if(Ratingresponse == "Inserted Successfully"){
                            alert('Rated Successfully');
                          }
                          else{
                            alert('** Error** Try Again Later');
                          }
                          $('#Reviewmodal').modal('toggle');

                      }
                  });
                 
                }
      })
});

	</script>
</body>
</html>