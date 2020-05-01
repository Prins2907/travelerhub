<?php
 include('includes/config.php');
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="js/popper.min.js">
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php
include('Includes/modals.php');
 include('Includes/header.php');
/*For Displaying Cities and Town Name */
$msg = "";
$cities="Select * from Cities";
$resultcities = $conn->query($cities);
/*For Displaying State's Name */
$states="Select * from States";
$resultstates = $conn->query($states);

$pck_category="Select * from Packagecategory";
  $resultcategory = $conn->query($pck_category);

  $duration ="Select * from days";
  $resultdays=$conn->query($duration);

/*ForListing The Destination Featured Slider*/
/*For Goa Listing*/
$sql_goa = "SELECT * from packages Where Destination='Goa'"; /*Where status = 'Approved'";*/
$result_goa = mysqli_query($conn,$sql_goa);
$rowcount_goa=mysqli_num_rows($result_goa);  
/*For Manali Packages Listing */
$sql_himachal_pradesh = "SELECT * from packages Where Destination='Himachal Pradesh'"; /*Where status = 'Approved'";*/
$result_himachal_pradesh = mysqli_query($conn,$sql_himachal_pradesh);
$rowcount_himachal_pradesh = mysqli_num_rows($result_himachal_pradesh);
/*For Jammu $ Kashmir Listing*/
$sql_jk = "SELECT * from packages Where Destination='Jammu & Kashmir'"; /*Where status = 'Approved'";*/
$result_jk = mysqli_query($conn,$sql_jk);
$rowcount_jk=mysqli_num_rows($result_jk);
/*For Madhya Pradesh Listing*/
$sql_mp = "SELECT * from packages Where Destination='Madhya Pradesh'"; /*Where status = 'Approved'";*/
$result_mp = mysqli_query($conn,$sql_mp);
$rowcount_mp=mysqli_num_rows($result_mp);
/*For Rajasthan Listing*/
$sql_rajasthan = "SELECT * from packages Where Destination='Rajasthan'"; /*Where status = 'Approved'";*/
$result_rajasthan = mysqli_query($conn,$sql_rajasthan);
$rowcount_rajasthan=mysqli_num_rows($result_rajasthan);

/*For Gujarat Listing*/
$sql_gujarat = "SELECT * from packages Where Destination='Gujarat'"; /*Where status = 'Approved'";*/
$result_gujarat = mysqli_query($conn,$sql_gujarat);
$rowcount_gujarat=mysqli_num_rows($result_gujarat);
/*Listing All the Approved Agencies*/
$sql_listing_agency = "SELECT * FROM agencyregister where Status='Approved'";
$result_listing_agency = $conn->query($sql_listing_agency);

?>

<title>Travelers Hub | Homepage</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function validateForm() {
  var x = $('#Search_city').val();
  if (x == "") {
      $('#validation_city').show();
    $('#validation_city').text("*From is Mandantory*");
    return false;
  }
  return true;
}
</script>
<script>
function sortDropDownListByText() {
// Loop for each select element on the page.
$("#city").each(function() {
// Keep track of the selected option.
var selectedValue = $(this).val();
// Sort all the options by text. I could easily sort these by val.
$(this).html($("option", $(this)).sort(function(a, b) {
return a.text.toUpperCase() == b.text.toUpperCase() ? 0 : a.text.toUpperCase() < b.text.toUpperCase() ? -1 : 1
}));
// Select one option.
$(this).val(selectedValue);
});
}
</script>
<script>
$(document).ready(function(){
  $('#validation_city').hide();
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

sortDropDownListByText();
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
/*	<!-- AGENCY SUBMIT BUTTON SCRIPT -->
	$("#agencysubmit").click(function(){
		var data = $('#agencyform').serialize();
console.log(data);
$.ajax({
    url: 'Sql_entry/Agencydata.php',
    dataType: 'json',
    type: 'post',
    data:data,
    success: function(response){
        console.log(response);
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
});
alert("Form Submitted Successfuly!");
return true;
});
<!--END  AGENCY SUBMIT BUTTON SCRIPT -->*/
/*<!-- USER SUBMIT BUTTON SCRIPT -->
$("#usersubmit").click(function(){
		var data1 = $('#userform').serialize();
console.log(data1);
$.ajax({
    url: 'Sql_entry/Userdata.php',
    dataType: 'json',
    type: 'post',
    data:data1,
    success: function(response){
        console.log(response);
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
});
alert("Form Submitted Successfuly!");
return true;
});


<!-- END USER SUBMIT BUTTON SCRIPT -->*/
$(".file").on("change",function(){
alert ("Inside File Function");
   var file = new FormData();
   file.append('file',$('.file')[0].files[0]);
   $.ajax({
    url: "proffupload.php",
    type: "post",
    data: file,
    processData: false,
    contentType: false, 
	success:function(respo){
     console.log(respo);
	 $(".hidden").val(respo);
    }
});
});
$(".file1").on("change",function(){
alert ("Inside File Function");
   var file = new FormData();
   file.append('file',$('.file1')[0].files[0]);
   $.ajax({
    url: "logoupload.php",
    type: "post",
    data: file,
    processData: false,
    contentType: false, 
	success:function(respo){
     console.log(respo);
	 $(".hidden1").val(respo);
    }
});
});
});
</script>
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
           
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
              <div class="alert alert-warning" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" id="validation_city" style="opacity: 1; transform: translateZ(0px) translateY(0%);font-size: 15px;"></div>
              <!-- <div class="alert alert-warning" <?php if(!$msg){ ?> style="display:none" <?php }else{ ?> style="display:block ; font-size: 15px;" <?php } ?>>   <strong>Warning!</strong> <?php echo $msg;?> 
              </div> -->
            </h1>
            <div class="block-17 my-4">
              <form action="Searchlist.php" name="Searchform" id="Searchform" method="post" class="d-block d-flex"  onSubmit="return validateForm()">
                <div class="fields d-block d-flex">
                  <div class="select-wrap one-third border-right">
                    
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="Search_city" id="Search_city" class="form-control form-default">
                        <option value="">From</option>
                        <?php while($rowcities = $resultcities->fetch_assoc()) { ?>
          <option value="<?php echo $rowcities['Ct_id'];?>"><?php echo $rowcities['Ct_name'];?></option>
          <?php }  ?> 
                                            </select>

                  </div>
                  <div class="select-wrap one-third border-right">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="Search_destination" id="Search_destination" class="form-control" placeholder="Keyword search">
                        <option value="">To</option>
                        <?php while($rowstates = $resultstates->fetch_assoc()) { ?>
          <option value="<?php echo $rowstates['S_name'];?>"><?php echo $rowstates['S_name'];?></option>
          <?php }  ?> 
                                            </select>

                  </div>
                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="Search_category" id="Search_category" class="form-control" placeholder="Keyword search">
                        <option value="">Category</option> 
                        <?php while($rowcategory = $resultcategory->fetch_assoc()) { ?>
        <option value="<?php echo $rowcategory['Category_name'];?>"><?php echo $rowcategory['Category_name'];?></option>
                              <?php } ?>
                                            </select>

                  </div>
                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="Search_duration" id="Search_duration" class="form-control" placeholder="Keyword search">
                        <option value="">Duration</option> 
                         <?php
                    while($rowdays = $resultdays->fetch_assoc()) { ?>
                  <option value="<?php echo $rowdays['Day_details'];?>"><?php echo $rowdays['Day_details'];?></option>
                  <?php } ?>
                                            </select>

                  </div>
                </div>
                <input type="submit" Name="Search" id="Search" class="search-submit btn btn-primary" value="Search">  
              </form>
            </div>
            <!-- <p>Or browse the highlights</p>
            <p class="browse d-md-flex">
              <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-fork"></i>Restaurant</a></span>
              <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-hotel"></i>Hotel</a></span>
              <span class="d-flex justify-content-md-center align-items-md-center"><a href="#"><i class="flaticon-meeting-point"></i>Places</a></span>
              <span class="d-flex justify-content-md-center align-items-md- center"><a href="#"><i class="flaticon-shopping-bag"></i>Shopping</a></span>
            </p> -->
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Best Price Guarantee</h3>
                <p>We Travelers Hub Provide the Best Price to our Customers</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Travellers Love Us</h3>
                <p>And we love our customer back. Seriously.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Best Travel Agent</h3>
                <p>We Provide Verified and Trusted Travel Agent to Our Customer</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Our Dedicated Support</h3>
                <p>We Provide Support to all the travel agents and Users</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-destination">
    	<div class="container">
    		<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Featured Suggsetion</span>
            <h2 class="mb-4"><strong>Featured</strong> Destination</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="destination-slider owl-carousel ftco-animate">
    					<div class="item">
		    				<div class="destination">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination_goa.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<h3><a href="#">Goa, India  </a></h3>  
             

		    						<span class="listing"><?php echo $rowcount_goa;?> Listing</span>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="destination">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination_himachal.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<h3><a href="#">Himachal Pradesh, India</a></h3>
		    						<span class="listing"><?php echo $rowcount_himachal_pradesh;?> Listing</span>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="destination">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination_jk.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<h3><a href="#">Jammu & Kashmir, India</a></h3>
		    						<span class="listing"><?php echo $rowcount_jk;?> Listing</span>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="destination">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination_mp.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<h3><a href="#">Madhya Pradesh, India</a></h3>
		    						<span class="listing"><?php echo $rowcount_mp;?> Listing</span>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="destination">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination_rj.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<h3><a href="#">Rajasthan, India</a></h3>
		    						<span class="listing"><?php echo $rowcount_rajasthan;?> Listing</span>
		    					</div>
		    				</div>
	    				</div>
	    				<div class="item">
		    				<div class="destination">
		    					<a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/destination_gj.jpg);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<h3><a href="#">Gujarat, India</a></h3>
		    						<span class="listing"><?php echo $rowcount_gujarat;?> Listing</span>
		    					</div>
		    				</div>
	    				</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading"> Trusted Verified Agency</span>
            <h2 class="mb-4"><strong>Our</strong> Agencies</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
           <?php
           $counter=0;
            while($row_listing_agency = $result_listing_agency->fetch_assoc()) { 
                  $counter+=1;
                  if($counter>4){
                    break;
                  }
                $Agency_logo_dir="Logo/".$row_listing_agency['Logo'];
                ?>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
<a href="agencyinfo.php?id=<?php echo $row_listing_agency['Agy_id']?>" class="img img-2 d-flex justify-content-center align-items-center" style='background-image: url("<?php echo "$Agency_logo_dir";?>");'>
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><?php echo $row_listing_agency['Agency_name'] ;?></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star-o"></i>
		    							<span>8 Rating</span>
		    						</p>
	    						</div>
	    						
    						</div>
    						<p><?php echo $row_listing_agency['Email_id'] ; echo "<br>"; echo $row_listing_agency['Contact_no']; ?></p>
    						<p class="days"><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> 
                    <?php
                    $cityid = $row_listing_agency['Ct_id'];
                    $sqlcityname="SELECT `Ct_name` from Cities where Ct_id = $cityid";
                    $res_city_name = mysqli_query($conn,$sqlcityname);
                    $fetch_city_name = mysqli_fetch_assoc($res_city_name); 
                    $cityname = $fetch_city_name["Ct_name"];

                    ?>
                    <?php echo $cityname; echo ", ";
                  echo $row_listing_agency['State'] ;?></span> 
    							<span class="ml-auto"><a href="agencyinfo.php?id=<?php echo $row_listing_agency['Agy_id']?>">Details</a></span>
    						</p>
    					</div>
    				</div>
    			</div><?php } ?>
    		</div>
    	</div>
    </section>

    

    <!-- <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3"> 
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Special Offers</span>
            <h2 class="mb-4"><strong>Top</strong> Tour Packages</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-1.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="#">Hotel, Italy</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star-o"></i>
		    							<span>8 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price per-price">$40<br><small>/night</small></span>
    							</div>
    						</div>
    						<p>Far far away, behind the word mountains, far from the countries</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Miami, Fl</span> 
    							<span class="ml-auto"><a href="#">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-2.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="#">Hotel, Italy</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star-o"></i>
		    							<span>8 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price per-price">$40<br><small>/night</small></span>
    							</div>
    						</div>
    						<p>Far far away, behind the word mountains, far from the countries</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Miami, Fl</span> 
    							<span class="ml-auto"><a href="#">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-3.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="#">Hotel, Italy</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star-o"></i>
		    							<span>8 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price per-price">$40<br><small>/night</small></span>
    							</div>
    						</div>
    						<p>Far far away, behind the word mountains, far from the countries</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Miami, Fl</span> 
    							<span class="ml-auto"><a href="#">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-4.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="#">Hotel, Italy</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star-o"></i>
		    							<span>8 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price per-price">$40<br><small>/night</small></span>
    							</div>
    						</div>
    						<p>Far far away, behind the word mountains, far from the countries</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Miami, Fl</span> 
    							<span class="ml-auto"><a href="#">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/hotel-5.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="#">Hotel, Italy</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star-o"></i>
		    							<span>8 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price per-price">$40<br><small>/night</small></span>
    							</div>
    						</div>
    						<p>Far far away, behind the word mountains, far from the countries</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Miami, Fl</span> 
    							<span class="ml-auto"><a href="#">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section> -->

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-start">
          
					<div class="col-md-1"></div>
          <div class="col-md-6 heading-section ftco-animate">
          	<span class="subheading">Reviews</span>
            <h2 class="mb-4 pb-3"><strong>User</strong> Experience Says</h2>
          	<div class="row ftco-animate">
		          <div class="col-md-12">
		            <div class="carousel-testimony owl-carousel">
                  <?php 
$sql_rating_comment ="SELECT * from Rating";
 $result_comment = $conn->query($sql_rating_comment);
while($rowcomment = $result_comment->fetch_assoc()) {
  $U_id=$rowcomment['U_id'];
  /*User Name and City*/
   $sql_u_name="SELECT Full_name,Ct_id,User_image,Gender from `userregister` where U_id ='$U_id'";
      $result_u_name = mysqli_query($conn,$sql_u_name);
      $fetch_u_name = mysqli_fetch_assoc($result_u_name); 
      $user_name = $fetch_u_name["Full_name"];
      $cty_id =$fetch_u_name['Ct_id'];
      $Gender=$fetch_u_name['Gender'];
      $Image_name =$fetch_u_name['User_image'];
      /* Agency Name */
      $A_id = $rowcomment['Agy_id'];
       $sql_agy_name="SELECT Agency_name from `agencyregister` where Agy_id ='$A_id'";
      $result_agy_name = mysqli_query($conn,$sql_agy_name);
      $fetch_agy_name = mysqli_fetch_assoc($result_agy_name); 
      $Agy_name = $fetch_agy_name["Agency_name"];
      /*City Name*/
       $sql_city_name="SELECT Ct_name from `cities` where Ct_id ='$cty_id'";
      $result_city_name = mysqli_query($conn,$sql_city_name);
      $fetch_city_name = mysqli_fetch_assoc($result_city_name); 
      $city_name = $fetch_city_name["Ct_name"];
                  ?>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5"<?php if($Image_name=="") { if($Gender=="Male"){ ?> style="background-image: url(images/dummy.jpg)" <?php }?>  style="background-image: url(images/dummyfemale.jpg)" <?php } else{ ?> style="background-image: url(user/<?php echo $Image_name;?>)" <?php } ?> >
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5"><?php echo $rowcomment['Comment'];?></p>
		                    <p class="name"><?php echo $user_name;?></p>
		                    <span class="position"><?php echo $city_name;?></span><br>
                        <span>Reviewed : <?php echo $Agy_name;?></span>
		                  </div>
		                </div>
		              </div>
		              <?php }?>
		            </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Special Offers</span>
            <h2 class="mb-4"><strong>Offer</strong> Zone</h2>
          </div>
        </div>    		
    		<div class="row">
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-1.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<h3><a href="#">Luxury Restaurant</a></h3>
    						<p class="rate">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star-o"></i>
    							<span>8 Rating</span>
    						</p>
    						<p>Far far away, behind the word mountains, far from the countries</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
    							<span class="ml-auto"><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-2.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<h3><a href="#">Luxury Restaurant</a></h3>
    						<p class="rate">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star-o"></i>
    							<span>8 Rating</span>
    						</p>
    						<p>Far far away, behind the word mountains, far from the countries</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
    							<span class="ml-auto"><a href="#">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-3.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<h3><a href="#">Luxury Restaurant</a></h3>
    						<p class="rate">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star-o"></i>
    							<span>8 Rating</span>
    						</p>
    						<p>Far far away, behind the word mountains, far from the countries</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
    							<span class="ml-auto"><a href="#">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-4.jpg);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<h3><a href="#">Luxury Restaurant</a></h3>
    						<p class="rate">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star-o"></i>
    							<span>8 Rating</span>
    						</p>
    						<p>Far far away, behind the word mountains, far from the countries</p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> San Franciso, CA</span> 
    							<span class="ml-auto"><a href="#">Book Now</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
            <span class="subheading">Recent Blog</span>
            <h2><strong>Tips, </strong>Articles &amp; Media</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/top.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<span class="tag">Tips, Travel</span>
                <h3 class="heading mt-3"><a>20 Best Places You Must Visit</a></h3>
                <div class="meta mb-3">
                  <div><a >August 11, 2018</a></div>
                  <div><a >Amit Saksena</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/toi.jpg');">
              </a>
              <div class="text p-4">
              	<span class="tag">Media</span>
                <h3 class="heading mt-3"><a>Travel Hub is Awarded as the best Website for Travel Lovers</a></h3>
                <div class="meta mb-3">
                  <div><a >November 15, 2019</a></div>
                  <div><a >Admin</a></div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a class="block-20" style="background-image: url('images/tips.jpg');">
              </a>
              <div class="text p-4">
              	<span class="tag">Travel Tips</span>
                <h3 class="heading mt-3"><a >Points and Things you should Carry while Travelling</a></h3>
                <div class="meta mb-3">
                  <div><a>May 05, 2019</a></div>
                  <div><a >Admin</a></div>
                  <div><a  class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a  class="block-20" style="background-image: url('images/nomi.jpg');">
              </a>
              <div class="text p-4">
              	<span class="tag">Media</span>
                <h3 class="heading mt-3"><a href="#">Nominated for The Making Work Easier for User</a></h3>
                <div class="meta mb-3">
                  <div><a >January 31, 2019</a></div>
                  <div><a >Admin</a></div>
                  <div><a  class="meta-chat"><span class="icon-chat"></span> 4</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>  
    

  <?php 
  include('includes/footer.php');?>
</body>
</html>