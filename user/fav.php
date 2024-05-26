<?php require_once "../db_config.php"; 
	SESSION_START();
	$u_id=$_SESSION['id'];
	$id=$_GET['id'];


	mysqli_query($con,"insert into fav_ad(`u_id`,`p_id`) Values($u_id, $id)");
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	

?>