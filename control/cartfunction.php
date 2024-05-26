<?php
require_once "../db_config.php";
$id=$_GET['id'];
$f=$_GET['f'];

$mac= GetMAC();

function GetMAC(){
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
}

session_start();
$u_id= $_SESSION['id'];


if($f=="add")
{
	mysqli_query($con,"insert into cart(`user`,`product`) values('$u_id',$id)");
	$cat_c=mysqli_query($con,"select count(id) from cart where user='$mac' or user='$u_id'");
								$row_ct=mysqli_fetch_array($cat_c,MYSQLI_ASSOC); 
								echo $row_ct["count(id)"];
}
else if($f=="rem")

{
	echo "deleted";
	
}

else{
	
	
}
	

?>