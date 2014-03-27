<!DOCTYPE html>
<html dir="ltr" lang="en-US"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"> 

<title>Login :: Sudipta's Blog </title>
<?php
	if(isset($_REQUEST["msg"]))
	{
		$msg=$_REQUEST["msg"];
		echo "<script language='javascript'	>";
			echo "alert('$msg')";
		echo "</script>";
		
	}
?>
<?php
session_start();			
	if(isset($_SESSION["type"]))
	{
	 if($_SESSION["type"]=="admin")
	    header("location:./login/index.php");
	}
?>
<link rel="stylesheet" href="./login_css/jquery-ui-1.8.18.custom.css" type="text/css" media="screen">
<link rel="stylesheet" href="./login_css/validationEngine.jquery.css" type="text/css">
<link rel="stylesheet" href="./login_css/icons.css" type="text/css">
<link rel="stylesheet" href="./login_css/forms.css" type="text/css">
<link rel="stylesheet" href="./login_css/tables.css" type="text/css">
<link rel="stylesheet" href="./login_css/ui.css" type="text/css">
<link rel="stylesheet" href="./login_css/style.css" type="text/css">
<link rel="stylesheet" href="./login_css/responsiveness.css" type="text/css">

<link type="text/css" rel="stylesheet" href="./login_css/signup/lightbox-css.css">

<!-- jQuery -->
<script src="./login_css/jquery.min.js"></script>
<script src="./login_css/jquery-ui.min.js"></script>
<!-- Validation engine -->
<script type="text/javascript" src="./login_css/jquery.validationEngine-en.js" charset="utf-8"></script>
<script type="text/javascript" src="./login_css/jquery.validationEngine.js"></script>
<!-- Knob -->
<script type="text/javascript" src="./login_css/jquery.knob.js"></script>

<!-- Caffeine custom JS -->
<script type="text/javascript" src="./login_css/custom.js"></script>

<!--[if IE]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]--> 
<!--[if lte IE 7]> <script src="js/IE8.js" type="text/javascript"></script> <![endif]--> 
<!--[if lt IE 7]> <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/> <![endif]--> 

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery("#login_form").validationEngine();
	});
</script>
<script type="text/javascript">
function validate()
{  
mail_id=document.test.mail_id.value;
f_name=document.test.f_name.value;
l_name=document.test.l_name.value;
fa_name=document.test.fa_name.value;
house_no=document.test.house_no.value;
phno=document.test.phno.value;
mob_num=document.test.mob_num.value;
o_city_name=document.test.o_city_name.value;
o_dist_name=document.test.o_dist_name.value;

if(f_name.length<3)
	{
		alert("Please Enter First name")
		return false
	}
if(l_name.length<3)
	{
		alert("Please Enter Last name")
		return false
	}
if(fa_name.length<3)
	{
		alert("Please Enter User ID")
		return false
	}
if(house_no.length==" ")
	{
		alert("Please Enter House Number")
		return false
	}
	if(mail_id.length=="")
	{
		alert("Enter Your Email....")
		return false
	}
	/*alert(mail_id.indexOf("@"));
	alert(mail_id.indexOf("."));
	alert(mail_id.lastIndexOf("."));*/
if(mail_id.indexOf("@")==-1 || mail_id.indexOf(".")==-1)
	{
		
		alert("Invalid Email Id....")
		return false
	}
if(mail_id.lastIndexOf(".")<mail_id.indexOf("@")+3 || mail_id.lastIndexOf(".")+3>mail_id.length)
	{
		
		alert("Invalid Email Id Format....")
		return false
	}
if(isNaN(phno) || phno.length<10)
	{
		alert("Please enter the 10 digit Phone number correctly...")
		return false
	}	
if(isNaN(mob_num) || mob_num.length<10)
	{
		alert("Please enter the 10 digit mobile number correctly...")
		return false
	}	
if(o_city_name.length<1)
	{
		alert("Please Enter the password");
		return false;
	}	
if(o_dist_name!==o_city_name)
	{
		alert("Password And Confirm Password Not Matched");
		return false;
	}
	alert("All Okay!!! Sueccsfull!!!")		
	return true
	
}
function validate_login()
{
  var usrid=document.getElementById("usrid").value;
  var usrpss=document.getElementById("usrpss").value;	
 if(usrid.length<1)
	 {
	 document.getElementById("msg1").style.display="block";
	  document.getElementById("msg1").innerHTML="<center>Please Enter User Id...</center>";
	  return false;
	 }
 if(usrpss.length<1)
	 {
	  document.getElementById("msg1").style.display="block";
	  document.getElementById("msg1").innerHTML="<center>Please Enter Password...</center>";
	  return false; 
	 }
 return true;	
}
</script>
<style type="text/css">
.msg{
 background:#CCF url(img/alert.jpg);
 background-size: 350px 30px;
 position:fixed;
 top:40%;
 left:40%;
 height:30px;
 width:350px;
 display:none;
}
</style>
</head>

<body id="index" class="home">
    <div id="loading-block" style="display: none;"></div> <!-- Loading block -->
    
    <section id="login-container">
        <div id="login_header"></div>
		
		<form id="login_form" action="login/login.php" method="post" onSubmit="return validate_login()">
			<div id="login_wrapper">
				<div class="login_wrapper_container">
					<div class="float_center_box">
						
						<div class="one-half logo-box">
							<!-- <a href="index.php"><img src="./login_css/login-logo.png" alt="Caffeine" height="50px;"></a> -->
						</div>
						
						<div class="clear"></div>
						<div class="box">
							<div class="inner">
							
								<div class="contents">
									<div class="one-half username-half">
										<label>Username</label>
										<div class="field-box"><span class="icon awesome user for-input"></span><input type="text" class="w-icon validate[required]" name="id" id="usrid" onClick="javascript:document.getElementById('msg1').style.display='none';"></div>
										<div class="clear"></div>
									</div>
									<div class="one-half password-half">
										<label>Password</label>
										<div class="field-box"><span class="icon awesome lock for-input"></span><input type="password" class="w-icon validate[required]" name="password" id="usrpss" onClick="javascript:document.getElementById('msg1').style.display='none';"></div>
										<div class="clear"></div>
									</div>
									
									<div class="clear"></div>
									<div class="line-separator"></div>
									<div class="one-half"> &nbsp;
   <!-- <a onClick="document.getElementById('shadowing').style.display='block';
	  document.getElementById('box').style.display='block';">Register</a>-->
									</div>
									
									<div class="one-half right"><div></div>
										<input type="submit" value="Login" name="adminlogin" class="button blue tiny">
									</div><br><br>
									<div class="one-half right"><div></div>
										<input type="button" value="Go To Website" style="width:450px;" name="adminlogin" class="button green large" onClick="javascript:document.location='index.php';">
									</div>
									<div class="clear"></div>
									
								</div>
								<div class="clear"></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
        <div id="login_footer">
        </div>
    </section>
 <div id="shadowing"></div>
<div id="box">
<div id="boxheader">
    Registration Form
   <span id="boxclose" onClick="document.getElementById('box').style.display='none';
   document.getElementById('shadowing').style.display='none'"> </span>
</div>
<!--<div id="boxcontent"  onclick="closebox()">  </div>-->
 <div id="boxtitle"></div><br>
<form action="login/signup.php" method="post" name="test" onSubmit="return validate_login();"><center><br>
 <table width="634" border="0">
  <tr align="left">
    <th width="263" colspan="2"> PERSONAL DEATILS</th>
  </tr>
  <tr>
    <td>First Name:-</td>
    <td width="361"><input type="text" name="f_name" size="25"/></td>
  </tr>
  <tr>
    <td>Last Name:-</td>
    <td><input type="text" name="l_name" size="25"/></td>
  </tr>
  <tr>
    <td>User ID</td>
    <td><input type="text" name="fa_name" size="25"/></td>
  </tr>
   <tr>
    <td>City</td>
    <td><input type="text" name="c_name" size="25"/></td>
  </tr>
   <tr>
    <td>State</td>
    <td><input type="text" name="S_name" size="25"/></td>
  </tr>
   <tr>
    <td>Country</td>
    <td><input type="text" name="co_name" size="25"/></td>
  </tr>
  
  
 <table width="632" height="30" border="0" >
   <tr align="left"><th colspan="4">PASSWORD:-</th></tr>
   <TR>
     <td width="115">Create Password</td>
     <td width="156"><input type="text" name="o_city_name" size="20" maxlength="30"/></td>
     <td width="111">Confirm Password</td>
     <td width="232"><input type="text" name="o_dist_name" size="25" maxlength="30"/></td>
   </tr>
 </table>
       <input type="submit" name="submit" id="button2" value="Submit" />
       <input type="reset" name="reset"  value="Reset"/>
</center></form>

</div>
</div>   
 <div class="msg" id="msg1"></div>
</body></html>
