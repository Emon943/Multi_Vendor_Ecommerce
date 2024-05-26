<?php require_once "db_config.php"; 

$mac= GetMAC();

function GetMAC(){
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
}


	mysqli_query($con,"delete from cart where user='$mac'");
	Header("Location: cart");
	



?>