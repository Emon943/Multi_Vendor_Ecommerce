<?php require_once "../db_config.php"; 

	$id=$_GET['id'];
	$page=$_GET['page'];
	$field=$_GET['field'];

	mysqli_query($con,"delete from $field where id=$id");
	Header("Location: $page?Delete_Success!");
	



?>