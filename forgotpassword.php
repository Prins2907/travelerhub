<?php include('includes/config.php');
?>
<!DOCTYPE>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
	<form action="">
<input type="text" name="Email_id" id="Email_id" value="" required>
<input type="Submit" name="Send Mail" id="Mail">
</form>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#Mail').click(function(){
			$.ajax({
    url: 'Sql_entry/forgot.php',
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
		})

	})
</script>
</html>
