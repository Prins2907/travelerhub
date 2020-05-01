<script>
  /*For Standard Inclusion*/
$("#todolist_S_inclu").focus(function() {
    if(document.getElementById('todolist_S_inclu').value === ''){
        document.getElementById('todolist_S_inclu').value +='• ';
    }
});
$("#todolist_S_inclu").keyup(function(event){
var keycode_Sin = (event.keyCode ? event.keyCode : event.which);
if(keycode_Sin == '13')
{  
 document.getElementById('todolist_S_inclu').value +='• ';
}
});
/*For Standard Exclusion Content*/
$("#todolist_S_exclu").focus(function() {
    if(document.getElementById('todolist_S_exclu').value === ''){
        document.getElementById('todolist_S_exclu').value +='• ';
    }
});

$("#todolist_S_exclu").keyup(function(event){
var keycode_Sx = (event.keyCode ? event.keyCode : event.which);
if(keycode_Sx == '13')
{  
 document.getElementById('todolist_S_exclu').value +='• ';
}

});
/*For Deluxe Inclusion*/
$("#todolist_D_inclu").focus(function() {
    if(document.getElementById('todolist_D_inclu').value === ''){
        document.getElementById('todolist_D_inclu').value +='• ';
    }
});

$("#todolist_D_inclu").keyup(function(event){
var keycode_Din = (event.keyCode ? event.keyCode : event.which);
if(keycode_Din == '13')
{  
 document.getElementById('todolist_D_inclu').value +='• ';
}

var txtval_D_inclu = document.getElementById('todolist_D_inclu').value;
if(txtval_D_inclu.substr(txtval_D_inclu.length - 1) == '\n')
{
    document.getElementById('todolist_D_inclu').value = txtval_D_inclu.substring(0,txtval_D_inclu.length - 1);
    }

});
/*For Deluxe Exclusion Content*/
$("#todolist_D_exclu").focus(function() {
    if(document.getElementById('todolist_D_exclu').value === ''){
        document.getElementById('todoli`st_D_exclu').value +='• ';
    }
});

$("#todolist_D_exclu").keyup(function(event){
var keycode_Dex = (event.keyCode ? event.keyCode : event.which);
if(keycode_Dex == '13')
{  
 document.getElementById('todolist_D_exclu').value +='• ';
}

var txtval_D_exclu = document.getElementById('todolist_D_exclu').value;
if(txtval_D_exclu.substr(txtval_D_exclu.length - 1) == '\n')
{
    document.getElementById('todolist_D_exclu').value = txtval_D_exclu.substring(0,txtval_D_exclu.length - 1);
    }

});

/*For Premium Inclusion*/
$("#todolist_P_inclu").focus(function() {
    if(document.getElementById('todolist_P_inclu').value === ''){
        document.getElementById('todolist_P_inclu').value +='• ';
    }
});

$("#todolist_P_inclu").keyup(function(event){
var keycode_Pin = (event.keyCode ? event.keyCode : event.which);
if(keycode_Pin == '13')
{  
 document.getElementById('todolist_P_inclu').value +='• ';
}

var txtval_P_inclu = document.getElementById('todolist_P_inclu').value;
if(txtval_P_inclu.substr(txtval_P_inclu.length - 1) == '\n')
{
    document.getElementById('todolist_P_inclu').value = txtval_P_inclu.substring(0,txtval_P_inclu.length - 1);
    }

});
/*For Premium Eclusion Content*/
$("#todolist_P_exclu").focus(function() {
    if(document.getElementById('todolist_P_exclu').value === ''){
        document.getElementById('todolist_P_exclu').value +='• ';
    }
});

$("#todolist_P_exclu").keyup(function(event){
var keycode_Pex = (event.keyCode ? event.keyCode : event.which);
if(keycode_Pex == '13')
{  
 document.getElementById('todolist_P_exclu').value +='• ';
}

var txtval_P_exclu = document.getElementById('todolist_P_exclu').value;
if(txtval_P_exclu.substr(txtval_P_exclu.length - 1) == '\n')
{
    document.getElementById('todolist_P_exclu').value = txtval_P_exclu.substring(0,txtval_P_exclu.length - 1);
    }

});
</script>