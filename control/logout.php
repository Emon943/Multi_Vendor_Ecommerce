<?php session_start(); 
		if($_SESSION['name']=="" || $_SESSION['id']=="" || $_SESSION['mail']=="" || $_SESSION['url']=="" || $_SESSION['rss']=="" || $_SESSION['status']==""){

	header("location: ../login?r=session");	}
	
	session_destroy();
	header('Location: ../login?r=logout');
	?>
