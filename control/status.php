<?php require_once "../db_config.php"; 
	SESSION_START();
	$u_id=$_SESSION['id'];
	$id=$_GET['id'];
	$c=$_GET['c'];


	mysqli_query($con,"update invoice set status=$c where id=$id");
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	

?>