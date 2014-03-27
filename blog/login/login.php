<?php
require_once("../includes/header.php");
session_start();			
	if(isset($_SESSION["type"]))
	{
	 if($_SESSION["type"]=="admin")
	    header("location:home.php");
	}
?>
 </head>
<body id="index" class="home">
    <div id="loading-block" style="display: none;"></div> <!-- Loading block -->
    
    <section id="login-container">
        <div id="login_header"></div>
        <div id="login_wrapper">
				<div class="login_wrapper_container">
					<div class="float_center_box">
						
						<div class="one-half logo-box">
							<!--<img src="../login_css/login-logo.png" alt="Caffeine">-->
						</div>
						
						<div class="clear"></div>
						<div class="box">
							<div class="inner">
							
								<div class="contents">
									<div class="one-half username-half">
										
										<div class="clear"></div>
									</div>
<?php
require_once("../includes/db.php"); 
/* Login */
if(isset($_REQUEST["adminlogin"]))
{ 
		$user=$_REQUEST["id"];
		$pass=$_REQUEST["password"];

		$login_qry=mysql_query("select * from `login` where `username`='$user' and `password`='$pass' ");
		$login_row=mysql_num_rows($login_qry);
		$login_array=mysql_fetch_array($login_qry);
		if($login_row>0)
		{
			session_start();
			ob_start();
		 if($login_array["type"]=="admin")
	    	{
				$_SESSION["type"]=$login_array["type"];
				$_SESSION["name"]=$login_array["name"];
				$_SESSION["id"]=$login_array["username"];
				header("location:index.php");	
			}
	  /*   if($login_array["type"]=="staff")   
	    	{
				$_SESSION["type"]=$login_array["type"];
				$_SESSION["name"]=$login_array["name"];
				$_SESSION["id"]=$login_array["username"];
				header("location:staff/home.php");	
			}
			*/
		}
		

	
	echo "<center><h1>Invalid User Id or Password.<br>Login Failed<br><input type='button' onClick='history.go(-1);' value='Back' class='button red small'></h1></center>";
}
	


?>
<!--
<center><h1>Opppsss!!! SQL Injecttion can't possible.<br><input type="button" onClick="history.go(-1);" value="Back" class="button red small"></h1></center>-->



<?php
require_once("../includes/footer.php"); ?>
<?php
	if(isset($_REQUEST["msg"]))
	{
		$msg=$_REQUEST["msg"];
		echo "<script language='javascript'	>";
			echo "alert('$msg')";
		echo "</script>";
		
	}
?>