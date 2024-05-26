<?php
require_once "db_config.php";

$id=$_GET['id'];

if($id=="email")
{
	$email=$_POST['email'];
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<span style='color:red;font-size:10px;font-weight:bold;'>* Invalid email format</span>";
	}

else	
{
	$result=mysqli_query($con,"select * from user where email='$email'");
	$amt=mysqli_num_rows($result);
	if($amt > 0)
	{
		echo "<span style='color:red;font-size:10px;font-weight:bold;'>* This email is already exists</span>";
		
	}
	else
	{
		echo "<span style='color:green;font-size:10px;font-weight:bold;'>* ok</span>";
		
	}		
}
}
?>