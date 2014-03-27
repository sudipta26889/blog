<?php
	session_start();
	session_destroy();
	$_SESSION['type']="";
	$_SESSION['name']="";
	$_SESSION['id']="";
	header("location:../admin_login.php?msg=Administrator logout !");


?>