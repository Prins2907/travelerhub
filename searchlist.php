<?php include('Includes/config.php');
?>

<?php
  session_start();

 include('includes/modals.php');
  $results_per_page =3;
    if(isset($_POST['Search'])){
      

      $_SESSION["to"] = $_POST['Search_destination'];
      $_SESSION["from"] = $_POST['Search_city'];
      $_SESSION['duration']=$_POST['Search_duration'];
      $_SESSION['category']=$_POST['Search_category'];
    }
      $Search_city =" Ct_id = '".$_SESSION['from']."'";

        $Search_duration="";
        $Search_category="";
        $Search_destination="";

              if ($_SESSION["to"]!= "") {
               $Search_destination = " and Destination = '".$_SESSION["to"]."'";
              }

              if ($_SESSION["category"]!= "") {
                $Search_category = " and Category = '".$_SESSION["category"]."'";
              }

              if($_SESSION["duration"]!= "") {
                $Search_duration = " and Duration = '".$_SESSION["duration"]."'";
              }
               //Ct_id = '".$Search_city."".$Search_category."".$Search_destination."".$Search_duration."'"
              //",$Search_city,$Search_destination,$Search_category,$Search_duration
              //Ct_id = '".$Search_city."".$Search_duration."'"
               $search_sql = "SELECT * from packages where ".$Search_city." ".$Search_destination." ".$Search_category." ".$Search_duration;
               $res_search = mysqli_query($conn,$search_sql);
                $no =mysqli_num_rows($res_search);

               /*if(mysqli_num_rows($res_search) == 0)
               {
                   $msg="Sorry, There Are No Such Packages Available";
                   //alert($msg);
               }
               else{
               $no =mysqli_num_rows($res_search);
               echo $no;
               }*/

   
    
            $number_of_pages = ceil($no/$results_per_page);
            if(!isset($_GET['page'])){
              $page = 1;
            }
              else{
                $page = $_GET['page'];
              }
              $this_page_first_result=($page-1)*$results_per_page;
              $Sentence = " LIMIT ".$this_page_first_result.",".$results_per_page;
               $search_sql = "SELECT * from packages where ".$Search_city." ".$Search_destination." ".$Search_category." ".$Search_duration." ".$Sentence;
               $res_search = mysqli_query($conn,$search_sql);
 include('Includes/header.php');?>



 <title>Search | Packages </title>
 <style type="text/css">
 #Detailsmodal .modal-body{
  max-height: 70vh;
  overflow-y: auto;
}

   /*.modal-body {
    
   background-color: black;
}
.modal-content {
  font-size: 20px;
  color: white;
}
*/
.modal-content {
  font-size: 20px;
 }
 /*For Sticky Compare*/
.bb {
    border-bottom: 1px solid #f0f0f0;
}

.wfull {
    width: 100%!important;
}
.pr8 {
    padding-right: 8px!important;
}
.pl8 {
    padding-left: 8px!important;
}
.pb5 {
    padding-bottom: 5px!important;
}
.pt5 {
    padding-top: 5px!important;
}
.listick {
    display: inline-block;
    position: relative;
}
.heading-compare {
    font-size: 14px;
    font-weight: 700;
    text-align: center;
    color: #3e3e3e;
    margin-bottom: 0;
    padding-bottom: 8px;
}

.p0 {
    padding: 0!important;
}
.package-list-compare {
    border-bottom: 1px solid #efefef;
    padding-bottom: 6px;
    padding-top: 6px;
    padding-right: 24px;
    position: relative;
}
.closeIcon-compare {
    width: 18px;
    height: 18px;
    position: absolute;
    right: 8px;
    top: 4px;
    background-color: #f2f2f2;
    color: #000;
    font-weight: 700;
    padding: 4px;
    cursor: pointer;
}
.buttonsticky {
    line-height: 1;
}
.package-name-heading {
    font-size: 15px;
    color: #20a397;
    margin-bottom: 0;
}
.currency-compare, .package-name-heading {
    font-family: Lato;
    font-weight: 700;
    text-align: left;
}

.iblock {
    display: inline-block!important;
}
.fright {
    float: right!important;
}
.night-compare {
    font-family: Lato;
    font-size: 12px;
    font-weight: 700;
    text-align: left;
    color: #3e3e3e;
}
.relative {
    position: relative!important;
}
.btn-filled-pri.btn-pkg-count-one.disabled, .btn-pkg-count-one.disabled.btn-filled-pri-large {
    background-color: #f2f2f2;
    color: #3e3e3e;
    text-transform: none;
}
.btn-filled-pri.disabled, .disabled.btn-filled-pri-large {
    background: #d3d3d3;
    color: #b1b1b1;
    cursor: not-allowed;
}
.btn-filled-pri, .btn-filled-pri-large {
    display: inline-block;
    font-size: 14px;
    line-height: 16px;
    padding: 12px 25px;
    text-align: center;
    background-color: #fe5246;
    border: 0;
    text-decoration: none;
    color: #fff;
    text-transform: capitalize;
    font-weight: 700;
    cursor: pointer;
    -webkit-appearance: none;
}
.radius0 {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0;
}
.compare-section-container ul {
    margin: 0;
    padding: 0;
}
 .compare-section-container {
    background-color: #fff;
    position: relative;
    border: 1px solid #f1f1f1;
    box-shadow: 0 0 8px 0 rgba(0,0,0,.2);
}
 .showCompare .sticky-inner-wrapper {
    right: 30px;
    width: 48px!important;
    z-index: 101!important;
}
.showCompare .compare-packages-box {
    visibility: visible;
}
.compare-packages-box {
    width: 48px;
    height: 48px;
    right: 70px;
    z-index: 101;
    visibility: hidden;
}
.compare-section-container {
    background-color: #fff;
    position: relative;
    border: 1px solid #f1f1f1;
    box-shadow: 0 0 8px 0 rgba(0,0,0,.2);
}

.compare-section-container-outer {
    min-width: 285px;
    max-width: 285px;
    height: auto;
    right: 46px;
    padding-right: 12px;
    top: 50%;
    z-index: 10;
    display: none;
    position: absolute;
}

.compare-button {
    width: 48px;
    height: 48px;
    position: relative;
}
.packages-counter {
    width: 48px;
    height: 48px;
    border-radius: 100px;
    background-color: #2196f3;
    box-shadow: 0 0 8px 0 rgba(0,0,0,.2);
    cursor: pointer;
}
.combineddiv {
    width: 30px;
    height: 50px;
    position: relative;
    left: 10px;
    top: 13px;
}
.topSlantHeight {
    width: 24px;
    height: 1px;
    background-color: #fff;
    display: block;
    transform: rotate(346deg);
    top: 2px;
    position: relative;
}
.firstWeigh {
    left: 0;
    top: 0;
}
.firstcircle, .secondcircle {
    width: 9px;
    height: 5px;
    border-radius: 10px;
    background-color: #fff;
    display: block;
    position: absolute;
}
.firstcircle {
    top: 11px;
    left: 1px;
}
.secondWeight {
    left: 16px;
    top: -3px;
}

.firstWeigh, .secondWeight {
    position: absolute;
    transform: rotate(446deg);
    margin-top: -9px;
    color: #fff;
    font-size: 23px;
}
.secondcircle {
    top: 8px;
    left: 17px;
}
.firstcircle, .secondcircle {
    width: 9px;
    height: 5px;
    border-radius: 10px;
    background-color: #fff;
    display: block;
    position: absolute;
}

.topLine {
    width: 1px;
    height: 19px;
    left: 13px;
}

.bottomLine, .topLine {
    background-color: #fff;
    display: block;
    position: relative;
}
.bottomLine {
    width: 19px;
    height: 1px;
    left: 4px;
}
.packages-counter .length-compare {
    width: 16px;
    height: 16px;
    background-color: #fe5246;
    color: #fff;
    border-radius: 10px;
    font-size: 10px;
    text-align: center;
    display: inline-block;
    position: absolute;
    right: -2px;
    top: -4px;
}
.cp-pkg-count-active {
    opacity: 1;
}
.compare-text {
    position: absolute;
    top: 50px;
    font-size: 12px;
    margin: 0;
    text-align: center;
    left: 50%;
    transform: translateX(-50%);
}
.containersticky {
    width: 1000px;
    max-width: 100%;
}
.closeIcon-compare svg {
    width: 10px;
    height: 10px;
    display: block;
}
svg {
    max-height: 100%;
}
.currency-compare {
    font-size: 14px;
    color: #4caf50;
    line-height: 20px;
}

.currency-compare, .package-name-heading {
    font-family: Lato;
    font-weight: 700;
    text-align: left;
}
.iblock {
    display: inline-block!important;
}
.fright {
    float: right!important;
}

.compare-packages-box:hover .compare-section-container-outer{display:block}.combineddiv{width:30px;height:50px;position:relative;left:10px;top:13px}

@keyframes click-wave {
  0% {
    height: 40px;
    width: 40px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 200px;
    width: 200px;
    margin-left: -80px;
    margin-top: -80px;
    opacity: 0;
  }
}
.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  //appearance: none;
  position: relative;
  top: 13.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 15px;
  width: 15px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #40e0d0;
}
.option-input:checked::before {
  height: 15px;
  width: 15px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 15.66667px;
  text-align: center;
  line-height: 15px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
.option-input.radio {
  border-radius: 50%;
}
.option-input.radio::after {
  border-radius: 50%;
}
.radio-container { 
    box-sizing: border-box; 
    font-family: ‘Open Sans’, sans-serif; 
    font-size: 13px; 
    line-height: 30px; 
    margin: 0; 
     outline: 0; 
    overflow: hidden; 
    padding: 0; 
}
.radio-container input { 
     box-sizing: border-box; 
    margin: 0; 
    outline: 0; 
    padding: 0; 
    position: relative; 
    top: 9px; 
    vertical-align: top; 
} 
 </style>
  <link rel="stylesheet" href="Agency/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <div class="hero-wrap" style="background-color: Black ; height:100px">
      <div class="overlay"></div>
      <div class="container">
       
        </div>
      </div>
    
<div class="row">
</div>
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <p style="padding-left: 280px;color: red" class="msgprint">**Default Rate is for Standard</p>
        <div class="row">
        	<div class="col-lg-3 sidebar ftco-animate">
        		<div class="sidebar-wrap bg-light ftco-animate">
        			<h3 class="heading mb-4">You Selected</h3>
        			<form action="#">
        				<div class="fields">
		              <div class="form-group">
		              	<?php
		              	$sqlcityname="SELECT `Ct_name` from Cities where $Search_city";
		              	$res_city_name = mysqli_query($conn,$sqlcityname);
		              	$fetch_city_name = mysqli_fetch_assoc($res_city_name); 
						        $cityname = $fetch_city_name["Ct_name"];

		              	?>
		                <input type="text" class="form-control" value="<?php echo $cityname;?>" disabled>
		              </div>
		              <div class="form-group">
		                <div class="select-wrap one-third">
	                    <input type="text" class="form-control" value="<?php echo $_SESSION['to'];?>" Placeholder="Destination"disabled>

	                  </div>
		              </div>
		              <div class="form-group">
						<input type="text" class="form-control" value="<?php echo $_SESSION['category'];?>" Placeholder="Category"disabled>
		              </div>
		              <div class="form-group">
						<input type="text" class="form-control" value="<?php echo $_SESSION['duration'];?>" Placeholder="Duration" disabled>
					</div>
		              <!-- <div class="form-group">
		              	<div class="range-slider">
		              		<span>
										    <input type="number" value="25000" min="0" max="120000"/>	-
										    <input type="number" value="50000" min="0" max="120000"/>
										  </span>
										  <input value="1000" min="0" max="120000" step="500" type="range"/>
										  <input value="50000" min="0" max="120000" step="500" type="range"/>
										</div>
		              </div>
		              -->
		            </div>
	            </form>
        		</div>
          </div>
          <div class="col-lg-9">
          	<div class="row">
          		<?php while($row_search= $res_search->fetch_assoc()) { 
                //$Agency_logo_dir="Logo/".$row_listing_agency['Logo'];
                ?>
                <?php
				$agency_id=$row_search['Agy_id'];
              	$sqlagencyname="SELECT `Agency_name` from agencyregister where Agy_id='$agency_id'";
              	$res_agencyname = mysqli_query($conn,$sqlagencyname);
              	$fetch_agencyname = mysqli_fetch_assoc($res_agencyname); 
				$agencyname = $fetch_agencyname["Agency_name"];

              	?>
          		<div class="col-md-4 ftco-animate">
		    				<div class="destination">
		    					<?php
		    					$path="Agency/List/".$agencyname."/".$row_search['Destination']."/".$row_search['Image'];

		              	?>
		    					<a  href="javascript:void(0)" data-toggle="modal" data-target="#Detailsmodal"  onclick="details_id(<?php echo $row_search["P_id"];?>)" class="img img-2 d-flex justify-content-center align-items-center" style='background-image: url("<?php echo $path;?>")'>
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
                          <div class="packname">
  				    						    <h3 id="Package_name_<?php echo $row_search['P_id'];?>"><?php echo $row_search['Package_name'];?></h3>
                            </div>
				    						<p class="rate">
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star"></i>
				    							<i class="icon-star-o"></i>
				    							<span>8 Rating</span>
				    						</p>
                        <div align="bottom" class="radio-container"><label style="font-size: 17">Add to compare &nbsp</label>
                          <input type ="checkbox" class="option-input checkbox" name="Compare" id="Compare_<?php echo $row_search['P_id'];?>" value="<?php echo $row_search['P_id'];?>">
                        </div>
			    						</div>
			    						<div class="two">
			    							<span id="Rate_Standard_<?php echo $row_search['P_id'];?>" class="price pricestandard">₹<?php echo $row_search['Standard'];?></span>
                        <span id="Rate_Deluxe_<?php echo $row_search['P_id'];?>" class="price pricedeluxe">₹<?php echo $row_search['Deluxe'];?></span>
                        <span id="Rate_Premium_<?php echo $row_search['P_id'];?>" class="price pricepremium">₹<?php echo $row_search['Premium'];?></span>

		    							</div>
		    						</div> 
                    <!-- For Radio Button -->
                    <div class="row radio-container">
                      <label class="radio-inline" style="padding-right: 10px;">
                        <input  type="radio" pack_id="<?php echo $row_search['P_id'];?>" pack_type="Standard" class="option-input radio" name="example_<?php echo $row_search['P_id'];?>" id="Standard_<?php echo $row_search['P_id'];?>" checked/> Standard </label>
                      <label class="radio-inline" style="padding-right: 9px">
                        <input type="radio" class="option-input radio" pack_type="Deluxe" pack_id="<?php echo $row_search['P_id'];?>" name="example_<?php echo $row_search['P_id'];?>" id="Deluxe_<?php echo $row_search['P_id'];?>" /> Deluxe </label>
                      <label class="radio-inline">
                        <input type="radio" pack_type="Premium" pack_id="<?php echo $row_search['P_id'];?>" class="option-input radio" name="example_<?php echo $row_search['P_id'];?>" id="Premium_<?php echo $row_search['P_id'];?>" /> Premium </label>
                    </div>
                    <!-- End of Radio -->
		    						<hr>
		    						<div class="heightmanagement">
		    						<h6>
		    						<span style="font-weight:bold">Site seen</span>
		    					</h6>
		    						<?php 
		    						$str = $row_search['Destinationcover'];
		    						$Cover = explode(",",$str);
		    						 $arrlength = count($Cover);
		    						 echo "<ul>";
									for($x = 0; $x < $arrlength; $x++) {
									  echo "<li>";								  
									  echo $Cover[$x];
									  echo "</li>";
		    						}
		    						echo "</ul>"
		    						?>
		    					</div><br><br>
		    					<hr>
		    						<p class="days"><span id="Duration_<?php echo $row_search['P_id'];?>"><?php echo $row_search['Duration'];?></span></p>
		    						<hr>
		    						<p>
		    							<span><i class="icon-person"></i><a href="agencyinfo.php?id=<?php echo $row_search['Agy_id'];?>"><?php echo $agencyname;?></a></span><br><br><hr>
		    							<a class="btn btn-info" href="javascript:void(0)" data-toggle="modal" data-target="#Detailsmodal"  onclick="details_id(<?php echo $row_search["P_id"];?>)">Details</a>
                      
		    							<a class="btn btn-danger"  href="javascript:void(0)" <?php if(!empty($_SESSION['User_name'])) { ?>data-toggle="modal" data-target="#Enquirymodal" <?php } else { ?> data-toggle="modal" data-target="#login-modal" <?php } ?> onclick="enquiry_id(<?php echo $row_search["P_id"];?>)">Enquiry</a>	
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    		<?php } ?>
          	</div>
          	<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul >

                    <?php
                    /*for($page_no=1;$page_no<=$number_of_pages;$page_no++){
                      echo"";
                    }*/
                    $pagLink ="";
                    for($i=1; $i<=$number_of_pages; $i++) { 
  if($i==$page)  {
    $pagLink .= "<li class='active'><a href='searchlist.php?page= 
                                    ".$i."'>".$i."</a></li>"; 
  }
  else{
    $pagLink .= "<li><a href='searchlist.php?page=".$i."'> 
                                        ".$i."</a></li>";   
  }
};   
echo $pagLink;  
                    ?>
		                <!-- <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li> -->
		              </ul>
		            </div> 
		          </div>
		        </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section>
     <!-- .section -->
     <!-- For Icon -->
            <div class="sticky-outer-wrapper showCompare" style="height: 48px;"><div class="sticky-inner-wrapper" style="position: fixed; z-index: 1; transform: translate3d(0px, 300px, 0px); top: 0px; width: 1358px;"><div class="compare-packages-box">
              <div class="compare-section-container-outer absolute-center-v">
                <div class="compare-section-container">
                   <ul id="Icon_ul">
              <li class="pl8 pr8 pt5 pb5 bb wfull listick" id="heading_icon"><h4 class="heading-compare p0">Shortlisted Packages</h4></li>
              <li class="pl8 pr8 pt5 pb5 bb wfull listick" id="middle_icon"><span>No packages to compare. Please add using ‘Add to compare’ button.</span></li>
              <li class="wfull p4 listick" id="footer_icon"><button class="btn-filled-pri btn-pkg-count-one disabled radius0 wfull buttonsticky"><span></span>Select at least two packages</button></li>
              <li class="wfull p4" id="button_icon"><a href="" id='dynamicLink'><button class="btn-filled-pri radius0 wfull" id="Compare_button"><span></span>Compare Now</button></a></li>
            </ul>
          </div>
        </div>
        <div class="compare-button">
              <div class="packages-counter relative"><div>
              <div class="combineddiv">
              <span class="topSlantHeight"></span>
              <span class="firstWeigh">&lt;</span><span class="firstcircle"></span>
              <span class="secondWeight">&lt;</span>
              <span class="secondcircle"></span>
              <span class="topLine"></span>
              <span class="bottomLine"></span>
            </div>
          </div>
              <span class="CpPkgCount length-compare" id="Compare_icon_total">0</span>
              <p class="compare-text">Compare</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
	<Section>
            <div class="modal fade" id="Detailsmodal" role="dialog">
              <div class="modal-dialog modal-lg">
              
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header box box-info" style="background-color: #367fa9">
                <h4 class="modal-title">Package Details</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                  <section class="content">
      
        <form  name="addfeatures" method="post" class="form-horizontal">
        <div class="box-body">
          <div class="form-group">
              <label class="col-sm-2 control-label">Standard</label>
              <div class="col-sm-15">
          <div class="row form-group">
            <div class="col-md-6 mb-6">
              <label class="control-label">Inclusion</label>
      <ul id="List_S_inclu"></ul>
            </div>
          
          

            <div class=" col-md-6 mb-6">
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
            <div class="col-md-6 mb-6">
              <label class="control-label">Inclusion</label>
              <ul id="List_D_inclu"></ul>
            </div>
          
          

            <div class=" col-md-6 mb-6">
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
                      <div class="col-md-6 mb-6">
                        <label class="control-label">Inclusion</label>
                        <ul id="List_P_inclu"></ul>
                      </div>
              
                      <div class=" col-md-6 mb-6">
                        <label class="control-label">Exclusion</label>
                       <ul id="List_P_exclu"></ul>
                      </div>
                  </div>
            </div>
          </div>
    </div>    
        </form>
    </section>
    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
                
              </div>
            </div>
        </Section>


        <Section>
            <div class="modal fade" id="Enquirymodal" role="dialog">
              <div class="modal-dialog modal-lg">
              
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header" style="background-color: #367fa9">
                <h4 class="modal-title ">Enquiry Form</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                  <section class="content">
                  <div >
           

                    <form  name="Enquiryform" id="Enquiryform" method="post" class="form-horizontal">
                    <div class="box-body">
                      <input type="hidden" id="P_id" name="P_id" value="" readonly>
                      <input type="hidden" id="User_enquiry_id" name="User_enquiry_id" value="<?php echo $_SESSION['U_id'];?>" readonly>


                      <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                            <label for="forname">Full Name</label>
                              <div class="input-group">
                                      <span class="input-group-addon" style="padding: 10px;border: solid 1px"><i class="fa fa-user"></i></span>
                                      <input type="text" class="form-control" name="Name" id="Name" placeholder="Enter Your Name" value="<?php echo $_SESSION['User_name'];?>">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                               <div class="form-group">
                                <label for="forname">Email Id</label>
                              <div class="input-group">
                                <span class="input-group-addon" style="padding: 10px;border: solid 1px"><i class="fa fa-envelope"></i></span>
                                <input type="Email" class="form-control" name="Email_id" id="Email_id" placeholder="Email" value="<?php echo $_SESSION['Email_id'];?>" Readonly>
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                            <label for="forname">Mobile Number</label>
                              <div class="input-group">
                                      <span class="input-group-addon"  style="padding: 10px;border: solid 1px"><i class="fa fa-address-book"></i></span>
                                      <input type="Number" class="form-control" name="Mobile_no" id="Mobile_no" placeholder="Enter 10 digits Number" value="<?php echo $_SESSION['Mobile_no'];?>" Readonly>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                               <div class="form-group">
                                <label for="forname">Type</label>
                              <div class="input-group">
                                <span class="input-group-addon" style="padding: 10px;border: solid 1px"><i class="fa fa-bed"></i></span>
                                <select class="form-control" id="Type" name="Type">
                                 <option value="Standard">Standard</option>
                                 <option value="Deluxe">Deluxe</option> 
                                 <option value="Premium">Premium</option> 
                                </select>
                            </div>
                          </div>
                      </div>
                    </div>
                    <p style="color:Red;" id="Date_validation"></p>
                    <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                            <label for="forname">Depature Date</label>
                              <div class="input-group">
                                      <span class="input-group-addon"  style="padding: 10px;border: solid 1px"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" onchange="TDate()" name="Departure_date" id="Departure_date" placeholder="Select Date" autocomplete="off" required >
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="forname">Total Members</label>

                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-6 enbigfd">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon" style="padding: 10px;border: solid 1px"><span class="fa fa-group"></span></div>
                                        <select class="form-control" name="Adults" id="Adults">
                                            <option value="">Adults*</option>
                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-7 col-sm-7 col-xs-6 enbigfd bkchild">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon" style="padding: 10px;border: solid 1px"><span class="fa fa-child"></span></div>
                                        <select class="form-control" name="Children" id="Children">
                                            <option value="">Children (5-12 yr)</option>
                                           <option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>
                             <div class="form-group">
                              <textarea class="form-control z-depth-1" id="Comment" name="Comment" rows="3" placeholder="Write any Other Customization and Quotation if Neeeded...."></textarea>
                        </div>
                    </div>    
                    </form>

                </div>
                </section>
                    
                </div>
                <div class="modal-footer">
                  <button type="button" id="Enquirysubmit" class="btn btn-default">Submit</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
                
              </div>
            </div>
        </Section>

	<?php include('Includes/footer.php');?>

	<script >
		$( document ).ready(function() { 
    $('#state').change(function(){
        state_id = $('#state').val();
        //alert(state_id );
        passdata = {state1:state_id};
        $.ajax({
          url:"Sql_entry/find_city.php",
          data:passdata,
          type:"post",
          success:function(response){
            //alert(response);
            $('#agencycity').html(response);
          }
        })

      }) 
      $('.pricedeluxe, .pricepremium').hide();
      $('#button_icon').hide();

      $( "#Departure_date" ).datepicker();

      $('.radio').click(function(){
        var rpack_id =$(this).attr('pack_id');
        var radio_type = $(this).attr("pack_type");
if(radio_type == 'Deluxe'){
        $('#Rate_Deluxe_'+rpack_id).show("slow");
        $('#Rate_Standard_'+rpack_id).hide();
        $('#Rate_Premium_'+rpack_id).hide();
      }
      else if(radio_type == 'Premium'){
        $('#Rate_Deluxe_'+rpack_id).hide();
        $('#Rate_Standard_'+rpack_id).hide();
        $('#Rate_Premium_'+rpack_id).show("slow");
      }
      else{
        $('#Rate_Deluxe_'+rpack_id).hide();
        $('#Rate_Standard_'+rpack_id).fadeIn("slow");
        $('#Rate_Premium_'+rpack_id).hide();
      }
      })
      
      setTimeout(function(){ $('.msgprint').fadeOut() }, 5000);

      $("#Enquirysubmit").click(function(){
        var data = $('#Enquiryform').serialize();
        console.log(data);
        $.ajax({
          url: 'Sql_entry/Package_enquiry.php',
          type: 'post',
          data:data,
          success: function(response){
            //alert(response);
            //console.log(response);
              if(response == "New record created successfully"){
                alert("Enquiry Submitted");
              }
              else{
                alert("Try Again ! **Error While Submitting**");
              }
              $('#Enquirymodal').modal('hide');
              location.reload();
              
          }
      });
  });
    var heights = $(".heightmanagement, .one , .two").map(function() {
        return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);

    $(".heightmanagement, .one , .two").height(maxHeight);
});

	</script>
  <script>
     function TDate() {
    var UserDate = document.getElementById("Departure_date").value;
    var ToDate = new Date();
    var udate1 = new Date(UserDate);

    if (udate1.toLocaleDateString() < ToDate.toLocaleDateString()) {
         $('#Date_validation').text("**Present And Future Dates can be Selected");
         document.getElementById('Departure_date').value="";
          return false;
     }
    return true;
}
     $(document).ready(function () {
   
});
function enquiry_id(id){
  $('#P_id').val(id);
}
/*function check(){
  //alert($("#Compare_icon_total").text());
  if(!$("#Compare_icon_total").text() == ''){
            document.getElementById('Compare_icon_total').className = "CpPkgCount length-compare cp-pkg-count-active";
    }  
}*/
/*For Check-box*/
$(function() {

  $('input[name=Compare]').on('change', function() {
    /*$('#valuecheck').val($('input[name=Compare]:checked').map(function() {
      return this.value;
    }).get());*/
   var list =$('input[name=Compare]:checked').map(function() {
      return this.value;
    }).get();
     
      //alert(typeof(list));
     var Count_total = list.length;
    document.getElementById("Compare_icon_total").innerHTML = list.length;
    var requested_check = $(this).val();
    if(list.length == 0){
    $('#middle_icon').show();
    $('#footer_icon').show();
    $('#button_icon').hide();
    }
    else if(list.length >= 1){
      $('#middle_icon').hide();
      $('#button_icon').hide();
      if(list.length >=2){
        $('#footer_icon').hide();
        $('#button_icon').show();
      }
        else{
          $('#footer_icon').show();
        }
    }
 if(this.checked){


  var price = $('#Rate_Standard_'+requested_check).text();
  var p_name = $('#Package_name_'+requested_check).text();
  var trp_days = $('#Duration_'+requested_check).text();

    var textinsert = "<li class='wfull package-list-compare' id='"+requested_check+"'><div class='pl8 pr8 wfull'><button class='closeIcon-compare close'>&times;</button><p class='package-name-heading'>"+p_name+"</p><span class='iblock fright currency-compare'>"+price+"/-</span><span class='iblock fleft night-compare'>"+trp_days+"</span></div></li>";
    $(textinsert).insertAfter($('#heading_icon'));
    /*var link = $('#dynamicLink').attr('href');
    link+"&"+requested_check;
    */
/*      $('#requested_check').prev('li').prop('id',requested_check);
*/  }
  else{

    $('#'+requested_check).remove();
  }
/*  alert(list.toString());
*/
$('#dynamicLink').attr({"href" : 'comparepackages.php?ids=' + list.join(',')});

  });

});
/*For Status Modal of Detail Button and Search Click On Image*/
function details_id(id){
            $.ajax({
                   url: 'Agency/Sql_entry/Features_details.php',
                   type: 'POST',
                   dataType: "json",
                   data: {id:id},
                   success: function(data){
                     //alert(data['Agency_name']);
                  //console.log(data);
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
</body>
</html>