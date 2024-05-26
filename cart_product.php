<?php $mac= GetMAC();

function GetMAC(){
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
}
											   $cart_c=mysqli_query($con,"select count(id) from cart where user='$mac'");
												$row_crt=mysqli_fetch_array($cart_c,MYSQLI_ASSOC); 
												echo $row_crt["count(id)"]; 
												
												?>