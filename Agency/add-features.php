<?php 
session_start();
  if(strlen($_SESSION['name'])==0)
  { 
    header('location:index.php');
  } 
?>
<?php include('includes/config.php');?>
<?php
 $Ag_id=$_SESSION["id"];
$sql_name="SELECT * from packages Where Agy_id='$Ag_id'";
$result_name=$conn->query($sql_name);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agency | View Packages</title>
  <style type="text/css">
    .newList:hover {
  text-decoration: line-through;
}
  </style>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pacakages
        <small>Add Features to the Package</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.pho"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Features</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="box box-info">
           <div class="box-header with-border">
              <h3 class="box-title">Add Features to Packages</h3>
            </div>

        <form  name="addfeatures" method="post" class="form-horizontal">
        <div class="box-body">
            <div class="form-group">
              <label class="col-md-2 control-label">Select Package Name To Add Features</label>
              <div class="col-md-8">
                <div class="input-group">
                  <input type="hidden" name="Agency_id" id="Agency_id" value="<?php echo $Ag_id;?>">
                  <input type="hidden" name="Pack_name" id="Pack_name" value="">

                 <select Name="Select_name" id="Select_name" Class="form-control" >
                  <option value = "" >Select Package Name</option>
                        <?php 
                                while($row_name = $result_name->fetch_assoc()) { ?>
                              <option value="<?php echo $row_name['P_id'];?>"><?php echo $row_name['Package_name']; ?>
                            </option>
                              <?php } ?>
                        </select>
                </div>
              </div>
            </div>
        <div name="display" id="display">
          <div class="form-group">
              <label class="col-sm-2 control-label">Standard</label>
              <div class="col-sm-15">
          <div class="row form-group">
            <div class="col-md-4 mb-5">
              <label class="control-label">Inclusion</label>
              <input type="text" id="input_S_inclu"class="form-control">
      <ul id="List_S_inclu"></ul>
            </div>
          
          

            <div class=" col-md-4 mb-5">
              <label class="control-label">Exclusion</label>
              <input type="text" id="input_S_exclu"class="form-control" />
              <ul id="List_S_exclu"></ul>
            </div>
          </div>
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Deluxe</label>
              <div class="col-sm-15">
          <div class="row form-group">
            <div class="col-md-4 mb-5">
              <label class="control-label">Inclusion</label>
              <input type="text" id="input_D_inclu" class="form-control"/>
              <ul id="List_D_inclu"></ul>
            </div>
          
          

            <div class=" col-md-4 mb-5">
              <label class="control-label">Exclusion</label>
             <input type="text" id="input_D_exclu" class="form-control"/>
              <ul id="List_D_exclu"></ul>
            </div>
          </div>
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Premium</label>
              <div class="col-sm-15">
                  <div class="row form-group">
                      <div class="col-md-4 mb-5">
                        <label class="control-label">Inclusion</label>
                        <input type="text" id="input_P_inclu" class="form-control"/>
                        <ul id="List_P_inclu"></ul>
                      </div>
              
              

                      <div class=" col-md-4 mb-5">
                        <label class="control-label">Exclusion</label>
                       <input type="text" id="input_P_exclu" class="form-control"/>
                       <ul id="List_P_exclu"></ul>
                      </div>
                  </div>
            </div>
          </div>
          </div>  
        
    </div>
            <div class="box-footer">
                  <input type="button" name="Add" id="Add"  value="Submit" class="btn btn-info btn-default ">
                <input type="Reset" class="btn btn-default"> 
              </div>
        </form>

    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#display").hide();
    $("#Select_name").change(function(){
      var sel = $('#Select_name').val();
      $("#display").show();
      $("#Pack_name").val(sel);
    });
    $("#Add").click(function () {
      var Agency_id=$('#Agency_id').val();
      //alert(Agency_id);
      var Pack_id=$('#Pack_name').val(); 
      //alert(Pack_id);
      var S_inclu =$('#List_S_inclu').text(); // gets text contents of Standard Inclusion Ul Tag
      var S_exclu =$('#List_S_exclu').text(); // gets text contents of Standard Inclusion Ul Tag
      var D_inclu =$('#List_D_inclu').text(); // gets text contents of Standard Inclusion Ul Tag
      var D_exclu =$('#List_D_exclu').text(); // gets text contents of Standard Inclusion Ul Tag
      var P_inclu =$('#List_P_inclu').text(); // gets text contents of Standard Inclusion Ul Tag
      var P_exclu =$('#List_P_exclu').text(); // gets text contents of Standard Inclusion Ul Tag
                     //alert("S_exclu");
                     data={Agent_id:Agency_id,Package_id:Pack_id,
                           Standard_i:S_inclu,Standard_e:S_exclu,
                           Deluxe_i:D_inclu,Deluxe_e:D_exclu,
                           Premium_i:P_inclu,Premium_e:P_exclu}; 
                           //console.log(data);
                      $.ajax({
                      url:"Sql_entry/sql_add_features.php",
                      type: 'post',
                      data:data,
                      success: function(response){
                        //alert(response);
                        if(response=="Features Added Successfully"){
                          alert("Features Added Successfully");
                          location.reload(true);
                        }
                        else{
                          alert("**ERROR While Udpating Features**");
                        }
                      }
                      
                  });
    });
  $('#input_S_inclu').keyup(function(event){
    var keycode_Sin = (event.keyCode ? event.keyCode : event.which);
    if(keycode_Sin == '13'){
      newItem();
        }
    });
  $('#input_S_exclu').keyup(function(event){
    var keycode_Sex = (event.keyCode ? event.keyCode : event.which);
    if(keycode_Sex == '13'){
    newItem1();
        }
    });
  $('#input_D_inclu').keyup(function(event){
    var keycode_Din = (event.keyCode ? event.keyCode : event.which);
    if(keycode_Din == '13'){
    newItem2();
        }
    });
  $('#input_D_exclu').keyup(function(event){
    var keycode_Dex = (event.keyCode ? event.keyCode : event.which);
    if(keycode_Dex == '13'){
    newItem4();
        }
    });
  $('#input_P_inclu').keyup(function(event){
    var keycode_Pin = (event.keyCode ? event.keyCode : event.which);
    if(keycode_Pin == '13'){
    newItem5();
        }
    });
  $('#input_P_exclu').keyup(function(event){
    var keycode_Pex = (event.keyCode ? event.keyCode : event.which);
    if(keycode_Pex == '13'){
    newItem6();
        }
    });
  });
</script>
<script>
  //a=1;
function newItem() {
  var item = document.getElementById('input_S_inclu').value;
  var ul = document.getElementById("List_S_inclu");
  var li = document.createElement('li');
  li.setAttribute('class','newList');
  //li.setAttribute('id',+a);
  li.appendChild(document.createTextNode("- "+item));
  ul.appendChild(li);
  document.getElementById('input_S_inclu').value="";
//a++;
  //li.onclick = removeItem;
}
function newItem1() {
  var item1 = document.getElementById('input_S_exclu').value;
  var ul_1 = document.getElementById("List_S_exclu");
  var li_1 = document.createElement('li');
  li_1.setAttribute('class','newList');
  li_1.appendChild(document.createTextNode("- "+item1));
  ul_1.appendChild(li_1);
  document.getElementById('input_S_exclu').value="";
  li_1.onclick = removeItem;
}
function newItem2() {
  var item2 = document.getElementById('input_D_inclu').value;
  var ul_2 = document.getElementById("List_D_inclu");
  var li_2 = document.createElement('li');
  li_2.setAttribute('class','newList');
  li_2.appendChild(document.createTextNode("- "+item2));
  ul_2.appendChild(li_2);
  document.getElementById('input_D_inclu').value="";
  li_2.onclick = removeItem;
}
function newItem4() {
  var item4 = document.getElementById('input_D_exclu').value;
  var ul_4 = document.getElementById("List_D_exclu");
  var li_4 = document.createElement('li');
  li_4.setAttribute('class','newList');
  li_4.appendChild(document.createTextNode("- "+item4));
  ul_4.appendChild(li_4);
  document.getElementById('input_D_exclu').value="";
  li_4.onclick = removeItem;
}
function newItem5() {
  var item5 = document.getElementById('input_P_inclu').value;
  var ul_5 = document.getElementById("List_P_inclu");
  var li_5 = document.createElement('li');
  li_5.setAttribute('class','newList');
  li_5.appendChild(document.createTextNode("- "+item5));
  ul_5.appendChild(li_5);
  document.getElementById('input_P_inclu').value="";
  li_5.onclick = removeItem;
}
function newItem6() {
  var item6 = document.getElementById('input_P_exclu').value;
  var ul_6 = document.getElementById("List_P_exclu");
  var li_6 = document.createElement('li');
  li_6.setAttribute('class','newList');
  li_6.appendChild(document.createTextNode("- "+item6));
  ul_6.appendChild(li_6);
  document.getElementById('input_P_exclu').value="";
  li_6.onclick = removeItem;
}
function removeItem(e) {
  e.target.parentElement.removeChild(e.target);
}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</body>
</html>