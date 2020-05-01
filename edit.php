
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname="form1";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id=$_REQUEST['id'];
$query="SELECT * FROM form1 WHERE id='$id'";
$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);

/* echo $query; */
/* $row = mysql_fetch_array($result);
 */
?>
<html>
<head>
   <title>Reservation</title>
  


</head>
<body>
	<form action="" method="POST">
	 <fieldset>
		Name:<input type="text" name="name" value="<?php echo $row["name"] ?>" >
		&nbsp&nbsp Last Name: <input type="text" name="Lname" value="<?php echo $row['lname'] ?>" >
		&nbsp&nbsp DOB: <input type="text" name="DOB" value="<?php echo $row['DOB'] ?>" ><br><br>
		Gender:<input type="radio" name=Gender value="male"<?php echo($row["Gender"]=='male'?"checked":"")?>>Male &nbsp&nbsp&nbsp&nbsp 
		<input type="radio" name=Gender value="Female"<?php echo($row["Gender"]=='Female'?"checked":"")?>>Female <br><br>
		Marital Status: <input type="radio" name="marital" value="Single"<?php echo($row["marital"]=='Single'?"checked":"")?>>Single &nbsp&nbsp&nbsp&nbsp
		<input type="radio" name="marital" value="Married"<?php echo ($row["marital"]=='Married'?"checked":"")?>>Married marital <br><br>
		
		Country: <select name="country">  
						<option value="I"<?php echo ($row ['country']=='I'?"selected":"")?>>INDIA</option>
						<option value="A"<?php echo ($row ['country']=='A'?"selected":"")?>>AUSTRALIA</option>
						<option value="S"<?php echo ($row ['country']=='S'?"selected":"")?>>SRI LANKA</option>
						<option value="p"<?php echo ($row ['country']=='p'?"selected":"")?>>PAKISTAN</option>		
            	</select><br><br>
		adress1: &nbsp&nbsp <textarea name="adress1" ><?php echo $row["adress1"];?></textarea>&nbsp&nbsp&nbsp&nbsp
		adress2: &nbsp&nbsp <textarea name="adress2"><?php echo $row["adress2"];?> </textarea><br><br>
		Post code: <input type="number" name="postcode" value="<?php echo $row["postcode"];?>">&nbsp&nbsp
		Mobile No: <input type="number" name="Mono" value="<?php echo $row["Mono"];?>">&nbsp&nbsp 
		Telephone No :<input type="number" name="Telephone" value="<?php echo $row["Telephone"];?>">&nbsp&nbsp
		Email : <input type="email" name="mail" value="<?php echo $row["email"];?>"><br><br>
		
		<?php $data[] =json_decode($row["Degree"]);
		echo $row["Degree"];
		echo "<pre/>";
		print_r ($data);
		?>
		Degree : <input type="checkbox" name="Degree[]" value="Associate degree"<?php echo(in_array("Associate degree",$data[0]))?'checked':'' ?>>Associate degree &nbsp&nbsp
				 <input type="checkbox" name="Degree[]" value="Bachelors degree "<?php echo(in_array("Bachelors degree",$data[0]))?'checked':'' ?>>Bachelors degree &nbsp&nbsp
		         <input type="checkbox" name="Degree[]" value="Masters degree"<?php echo(in_array("Masters degree",$data[0]))?'checked':'' ?>>Masters degree &nbsp&nbsp
				 <input type="checkbox" name="Degree[]" value="PHD"<?php echo(in_array("PHD",$data[0]))?'checked':'' ?>> PHD <br><br>
		Photo: <input type="file" name="picture" accept="image/*"><br><br>
		<input type="submit" name="submit" value="save">&nbsp&nbsp<input type="reset" name="reset" value="reset">
	
	
	 </fieldset>
	</form>
	
	<?php if (isset($_POST['submit']))
{
	$Degree=json_encode( $_POST["Degree"]);
$sql = "UPDATE form1 SET name='$_POST[name]',
 lname='$_POST[Lname]',
 DOB='$_POST[DOB]',
 Gender='$_POST[Gender]',
 marital='$_POST[marital]',
 country='$_POST[country]',
 adress1='$_POST[adress1]',
 adress2='$_POST[adress2]',
 postcode='$_POST[postcode]',
 Mono='$_POST[Mono]',
 Telephone='$_POST[Telephone]',
 email='$_POST[mail]',
 Degree='$Degree',
 picture='$_POST[picture]'
 WHERE id='$id'";
 
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
 
}
?>