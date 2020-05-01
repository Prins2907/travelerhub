<?php include('Includes/config.php');
session_start();
?>
<?php include('Includes/header.php');?>

 <title>Travelers Hub | Agency</title>
 <style type="text/css">
 .m0 {
    margin: 0!important;
}

.widthfix{
  width: 20%;
  max-width: 20%;
  
}
.widthcontent{
width: 20%;
max-width: 20%;
}
.span_inclusion_exclusion{
    color: red; 
    font-size: 15px;
    font-weight: bold;
    font-style: italic;
    font-family: sans-serif;
}
.pfc1 {
    color: #20a397!important;
}
.fwb {
    font-weight: 700;
}
.f16, .f16p {
    font-size: 18px;
}
.f16 {
    line-height: 20px;
}
.span_rupee{
  color: green ; font-size: 20px;
}
td{
  font-size: 14.5px;
  font-weight: bold;
}
th{
  font-size: 16.5px;
}
 </style>
 <?php
$ids = $_REQUEST['ids'];
$Array_ids = explode(",",$ids);

$ids_length = count($Array_ids);

$sql_ids = "SELECT * from Packages WHERE `P_id` IN ($ids)";
$res_search_ids = mysqli_query($conn,$sql_ids);
$sql_f_ids = "SELECT * from `package_features` WHERE `P_id` IN ($ids)";
$res_search_f_ids = mysqli_query($conn,$sql_f_ids);


/*for($x = 0; $x < $ids_length; $x++) {
    $value = $Array_ids[$x];
    $sql = '$'."sql_".$x;
    $sql = "SELECT * from Packages Where P_id ='$value'";
    $
}*/

 ?>
 
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
<div class="row">
  <?php include('Includes/modals.php')?>
</div>
    <section class="ftco-section ftco-degree-bg">

      <div class="container">
        <h1 style="font-weight: bold;">Check out and compare packages</h1>
          <div class="col-lg-15">
        <table class="table table-bordered" style="height:100%px;width:100%;border:1px solid black" id="Profiletable">
          <tbody>
            <tr>
              <th class="widthfix"></th>
                <?php while($row_search_ids= $res_search_ids->fetch_assoc()) { 
                
                ?>
              <td class="<?php echo $row_search_ids['P_id'];?> widthcontent"><span class="f16 fwb pfc1 m0"><?php echo $row_search_ids['Package_name'];?></span><button class='close' id="<?php echo $row_search_ids['P_id'];?>">&times;</button></td>
              <?php }?> 
            </tr>
            <tr>
              <th class="widthfix"><i class="fa fa-clock-o"></i> Duration</th>
              <?php
              $res_search_ids = mysqli_query($conn,$sql_ids);
 
              while($row_search_ids= $res_search_ids->fetch_assoc()) { 
                
                ?>
              <td class="<?php echo $row_search_ids['P_id'];?> widthcontent"><span style="color: #330066 ;"><?php echo $row_search_ids['Duration'];?></span></td>
              <?php }?>
            </tr>
            <tr>
             <th class="widthfix" rowspan="3"><i class="fas fa-rupee-sign"></i> Price : Standard <br><br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Deluxe<br><br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Premium</th>
               <?php
              $res_search_ids = mysqli_query($conn,$sql_ids);
 
              while($row_search_ids= $res_search_ids->fetch_assoc()) { 
                
                ?>
              <td  class="<?php echo $row_search_ids['P_id'];?> widthcontent"><span class="span_rupee">₹</span> <?php echo $row_search_ids['Standard']."/-";?></td>
              <?php }?>
            </tr>
            <tr class="widthfix"> 
               <?php
              $res_search_ids = mysqli_query($conn,$sql_ids);
 
              while($row_search_ids= $res_search_ids->fetch_assoc()) { 
                
                ?>
              <td  class="<?php echo $row_search_ids['P_id'];?> widthcontent"><span class="span_rupee">₹</span> <?php echo $row_search_ids['Deluxe']."/-";?></td>
              <?php }?>
            </tr>
            <tr class="widthfix"> 
               <?php
              $res_search_ids = mysqli_query($conn,$sql_ids);
 
              while($row_search_ids= $res_search_ids->fetch_assoc()) { 
                
                ?>
              <td class="<?php echo $row_search_ids['P_id'];?> widthcontent"><span class="span_rupee">₹</span> <?php echo $row_search_ids['Premium']."/-";?></td>
              <?php }?>
            </tr>
            <tr>
              <th class="widthfix"><i class="fa fa-list-alt"></i> Category</th>
               <?php
              $res_search_ids = mysqli_query($conn,$sql_ids);
 
              while($row_search_ids= $res_search_ids->fetch_assoc()) { 
                
                ?>
              <td class="<?php echo $row_search_ids['P_id'];?> widthcontent"><?php echo $row_search_ids['Category'];?></td>
              <?php }?>
            </tr>
            <tr>
            <th class="widthfix"><i class="fa fa-globe"></i> Destination</th>
               <?php
              $res_search_ids = mysqli_query($conn,$sql_ids);
 
              while($row_search_ids= $res_search_ids->fetch_assoc()) { 
                
                ?>
              <td class="<?php echo $row_search_ids['P_id'];?> widthcontent"><?php echo $row_search_ids['Destination'];?></td>
              <?php }?>
            </tr>
            <tr>
            <th class="widthfix"><i class="fas fa-eye"></i> Site-Seen</th>
               <?php
              $res_search_ids = mysqli_query($conn,$sql_ids);
 
              while($row_search_ids= $res_search_ids->fetch_assoc()) { 
                $explode_siteseen = explode(",",$row_search_ids['Destinationcover']);
                $siteseen_length = count($explode_siteseen);

                ?>

              <td class="<?php echo $row_search_ids['P_id'];?> widthcontent"><ul>
                <?php
                for($x = 0; $x < $siteseen_length; $x++) {
                  echo"<li> $explode_siteseen[$x] </li>";
                   }
                ?>
              </ul>
              </td>
              <?php }?>
            </tr>
            <tr>
              <th colspan="4" class="sbc7"><i class="fa fa-map-marker-alt" ></i> Daywise Itinerary</th>
          </tr>
          <tr>
            <th class="widthfix"><i class="fas fa-angle-right"></i> Days</th>
              <?php
              $res_search_ids = mysqli_query($conn,$sql_ids);
 
              while($row_search_ids= $res_search_ids->fetch_assoc()) { 
                $explode_days = explode(",",$row_search_ids['Details']);
                $days_length = count($explode_days);

                ?>

              <td  class="<?php echo $row_search_ids['P_id'];?> widthcontent"><ul>
                <?php
                $counter =1;
                for($x = 0; $x < $days_length; $x++) {
                  echo"<li> Day:$counter <br> $explode_days[$x] </li>";
                  $counter++;
                   }
                ?>
              </ul>
              </td>
              <?php }?>
            </tr>
             <tr>
              <th colspan="4" class="sbc7"><i class="fas fa-check-circle"></i> Inclusion / <i class="fas fa-times-circle"></i> Exclusion <span class="span_inclusion_exclusion"> For Standard Packages</span></th>
          </tr>
            <tr>
            <th class="widthfix"> Inclusion</th>
              <?php
              $res_search_f_ids = mysqli_query($conn,$sql_f_ids);
 
              while($row_search_f_ids= $res_search_f_ids->fetch_assoc()) { 
                $explode_inc_standard = explode("-",$row_search_f_ids['Standard_inclusion']);
                $inc_stan_length = count($explode_inc_standard);

                ?>

              <td class="<?php echo $row_search_f_ids['P_id'];?> widthcontent"><ul>
                <?php
               
                for($x = 1 ; $x < $inc_stan_length; $x++) {
                  echo"<li> $explode_inc_standard[$x] </li>";
                   }
                ?>
              </ul>
              </td>
              <?php }?>
            </tr>
            <tr>
            <th class="widthfix"> Exclusion</th>
            <?php
              $res_search_f_ids = mysqli_query($conn,$sql_f_ids);
 
              while($row_search_f_ids= $res_search_f_ids->fetch_assoc()) { 
                $explode_exc_standard = explode("-",$row_search_f_ids['Standard_exclusion']);
                $exc_stan_length = count($explode_exc_standard);

                ?>

              <td class="<?php echo $row_search_f_ids['P_id'];?> widthcontent"><ul>
                <?php
               
                for($x = 1 ; $x < $exc_stan_length; $x++) {
                  echo"<li> $explode_exc_standard[$x] </li>";
                   }
                ?>
              </ul>
              </td>
              <?php }?>
            </tr>
            <tr>
              <th colspan="4" class="sbc7"><i class="fas fa-check-circle"></i> Inclusion / <i class="fas fa-times-circle"></i> Exclusion <span class="span_inclusion_exclusion"> For Deluxe Packages</span></th>
          </tr>
            <tr>
            <th class="widthfix"> Inclusion</th>
              <?php
              $res_search_f_ids = mysqli_query($conn,$sql_f_ids);
 
              while($row_search_f_ids= $res_search_f_ids->fetch_assoc()) { 
                $explode_inc_deluxe = explode("-",$row_search_f_ids['Deluxe_inclusion']);
                $inc_del_length = count($explode_inc_deluxe);

                ?>

              <td class="<?php echo $row_search_f_ids['P_id'];?> widthcontent"><ul>
                <?php
               
                for($x = 1 ; $x < $inc_del_length; $x++) {
                  echo"<li> $explode_inc_deluxe[$x] </li>";
                   }
                ?>
              </ul>
              </td>
              <?php }?>
            </tr>
            <tr>
            <th class="widthfix"> Exclusion</th>
              <?php
              $res_search_f_ids = mysqli_query($conn,$sql_f_ids);
 
              while($row_search_f_ids= $res_search_f_ids->fetch_assoc()) { 
                $explode_exc_deluxe = explode("-",$row_search_f_ids['Deluxe_exclusion']);
                $exc_del_length = count($explode_exc_deluxe);

                ?>

              <td class="<?php echo $row_search_f_ids['P_id'];?> widthcontent"><ul>
                <?php
               
                for($x = 1 ; $x < $exc_del_length; $x++) {
                  echo"<li> $explode_exc_deluxe[$x] </li>";
                   }
                ?>
              </ul>
              </td>
              <?php }?>
            </tr>
            <tr>
        <th colspan="4" class="sbc7"><i class="fas fa-check-circle"></i> Inclusion / <i class="fas fa-times-circle"></i> Exclusion <span class="span_inclusion_exclusion"> For Premium Packages</span></th>
          </tr>
            <tr>
            <th class="widthfix"> Inclusion</th>
              <?php
              $res_search_f_ids = mysqli_query($conn,$sql_f_ids);
 
              while($row_search_f_ids= $res_search_f_ids->fetch_assoc()) { 
                $explode_inc_premium = explode("-",$row_search_f_ids['Premium_inclusion']);
                $inc_pre_length = count($explode_inc_premium);

                ?>

              <td class="<?php echo $row_search_f_ids['P_id'];?> widthcontent"><ul>
                <?php
               
                for($x = 1 ; $x < $inc_pre_length; $x++) {
                  echo"<li> $explode_inc_premium[$x] </li>";
                   }
                ?>
              </ul>
              </td>
              <?php }?>
            </tr>
            <tr>
            <th class="widthfix"> Exclusion</th>
              <?php
              $res_search_f_ids = mysqli_query($conn,$sql_f_ids);
 
              while($row_search_f_ids= $res_search_f_ids->fetch_assoc()) { 
                $explode_exc_premium = explode("-",$row_search_f_ids['Premium_exclusion']);
                $exc_pre_length = count($explode_exc_premium);

                ?>

              <td class="<?php echo $row_search_f_ids['P_id'];?> widthcontent"><ul>
                <?php
               
                for($x = 1 ; $x < $exc_pre_length; $x++) {
                  echo"<li> $explode_exc_premium[$x] </li>";
                   }
                ?>
              </ul>
              </td>
              <?php }?>
            </tr>
        </tbody></table>
      </div>
       <!-- .col-md-8 -->

      </div>

    </section> <!-- .section -->

  <?php include('Includes/footer.php');?>
    
  <script>
    $( document ).ready(function() {
      $('.close').click(function(){
      var remove_id =$(this).attr('id');
      $('.'+remove_id).remove();

      })
    }); 
  </script>
</body>
<script >
  $(document).ready(function(){
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
});
</script>
</html>
