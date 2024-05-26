<?php require_once "../db_config.php"; 

	$id=$_GET['id'];
	$value=$_GET['value'];
	$page=$_GET['page'];
	

	mysqli_query($con,"update product set status=$value where id=$id");
	Header("Location: $page");
	



?>