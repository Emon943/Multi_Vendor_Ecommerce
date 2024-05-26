<?php require_once "../db_config.php"; 
session_start();
$u_id= $_SESSION['id'];
$mac= GetMAC();

function GetMAC(){
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
}


	mysqli_query($con,"delete from cart where user='$mac' or user='$u_id'");
	Header("Location: cart");
	



?>