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
$cities="Select * from Cities";
$resultcities = $conn->query($cities);
?>
 <title>Travelers Hub | Agency</title>
   <div class="hero-wrap" style="background-color: Black ; height:100px">

      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
           
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">

            </h1>
          </div>
        </div>
      </div>
    </div> 
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar ftco-animate">
        		<div class="sidebar-wrap bg-light ftco-animate">
        			<h3 class="heading mb-4">According to City</h3>
        			<form action="#">
        				<div class="fields">
		              
		              <div class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="" id="" class="form-control" placeholder="Keyword search">
	                      <option value="">Select City</option>
	                       <?php while($rowcities = $resultcities->fetch_assoc()) { ?>
          <option value="<?php echo $rowcities['Ct_id'];?>"><?php echo $rowcities['Ct_name'];?></option>
          <?php }  ?> 
	                    </select>
	                  </div>
		              </div>
		              
		        
		              <div class="form-group">
		                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
		              </div>
		            </div>
	            </form>
        		</div>

        		
          </div>

          <div class="col-lg-9">
          	<div class="row">
      <?php

      $sql_listing_agency = "SELECT * FROM agencyregister where Status='Approved'";
$result_listing_agency = $conn->query($sql_listing_agency);
            while($row_listing_agency = $result_listing_agency->fetch_assoc()) { 
                  
                $Agency_logo_dir="Logo/".$row_listing_agency['Logo'];
                ?>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
<a href="agencyinfo.php?id=<?php echo $row_listing_agency['Agy_id']?>" class="img img-2 d-flex justify-content-center align-items-center" style='background-image:url("<?php echo "$Agency_logo_dir";?>");'>
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
    								<div class="heightmanagement"> 
    								<h3><a href="agencyinfo.php?id=<?php echo $row_listing_agency['Agy_id']?>"><?php echo $row_listing_agency['Agency_name'] ;?></a></h3>		    					
    							</div><div class="rateheight">
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
    						</p>
    					</div>
    				
    				</div>
    			</div><?php } ?>
          	</div>
          	<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
    <script type="text/javascript">
    	$(document).ready(function() { 
    	var heights = $(".heightmanagement, .rateheight").map(function(){
        return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);
    $(".heightmanagement, .rateheight").height(maxHeight);
};
    </script>
	<?php include('Includes/footer.php');?>
</body>
</html>
