<?php
 require_once("session.php");
?><!DOCTYPE HTML>
<html>

<head>
  <title>::Sudipta's Blog - About Me::</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <!-- stylesheets -->
  <link type="text/css" rel="stylesheet" href="../login_css/signup/lightbox-css.css">
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
  <link href="../css/colour.css" rel="stylesheet" type="text/css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="../js/modernizr-1.5.min.js"></script>
  <script type="text/javascript">
   function validate()
   {
	var msg=document.fff.your_message.value;
	if(msg.length<1)
	{
	  alert("Please Enter About You....");
	  return false;	
	}
	   return true;
   }
   function validate1()
   {
	var fle=document.uuu.files.value;
	if(fle.length<1)
	{
	  alert("Please Chose the Photo....");
	  return false;	
	}
	   return true;
   }
  </script>
  <?php
  require_once("../includes/db.php"); 
  if(isset($_REQUEST['change_pic']))
  {
	  $old_file=$_REQUEST['old_file'];
	  $photo=$_FILES["files"];
	  $pname=$photo['name'];
	  $desired_dir="../images";
		 $query="UPDATE `aboutme` SET `photo`='$pname' WHERE `id`=1";
		 $qry=mysql_query($query) or die($con);			
         if($qry)
	     {
		   copy($photo['tmp_name'],"../images/".$photo['name']);
		   unlink("../images/".$old_file);
		   header("location:about.php?msg=Picture Successfully Changed");
		 }
   }
  if(isset($_REQUEST['contact_submitted']))
  {
	  $data=$_REQUEST['your_message'];
	$update_qry=mysql_query("UPDATE `aboutme` SET `about_me`='$data' WHERE `id`=1");  
	if($update_qry)  
	  header("location:about.php?msg=Successfully Updated");
  }
  ?>
</head>

<body>
  <div id="main">

    <!-- begin header -->
    <?php require_once("header.php"); ?>
    <!-- end header -->

    <!-- begin content -->
    <div id="site_content">
      <div id="left_content">
        <h1>About Me</h1>
        <p><?php
       
		$about_qry=mysql_query("select * from aboutme where id=1");
		$about_qry_row=mysql_fetch_array($about_qry,MYSQL_BOTH);
		echo $about_qry_row["about_me"];
		
		
	echo	'</p>
      </div>
      <div id="right_content">
	  <a href="#" onclick="document.getElementById(\'shadowing\').style.display=\'block\';
	  document.getElementById(\'box\').style.display=\'block\';" style="background:#666; font-size:x-large" title="Change" ><img src="../images/pencil.png" ></a>
        <img style="float: left; height:450px; width:450px;" src="../images/'.$about_qry_row["photo"].'" title="About Me" alt="About Me"/>
     </div> ';
	
	?>
    <div id="left_content">
    <form id="contact" action="about.php" name="fff" method="post" onSubmit="return validate()">
          <div class="form_settings">
         <p><span>Change About Me</span><textarea style="width:450px; height:110px" class="contact textarea" rows="5" cols="50" name="your_message"><?php echo $about_qry_row["about_me"]; ?></textarea></p> 
          <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="Change..." /></p>
          </div>
          
        </form>
    </div>
    </div>
    <!-- end content -->

    <!-- begin footer -->
    <?php require_once("footer.php"); ?>
    <!-- end footer -->

  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="../js/jquery.sooperfish.js"></script>
  <!-- initialise sooperfish menu -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
    <?php
	if(isset($_REQUEST["msg"]))
	{
		$msg=$_REQUEST["msg"];
		echo "<script language='javascript'	>";
			echo "alert('$msg')";
		echo "</script>";
		
	}
	
?>
<div id="shadowing"></div>
<div id="box" style="overflow:hidden; height:250px;">
<div id="boxheader" style="height:30px; font-size:11px">
    <h1><a>Change About You Picture</a></h1>
   <span id="boxclose" onClick="document.getElementById('box').style.display='none';
   document.getElementById('shadowing').style.display='none'"> </span>
</div>
<!--<div id="boxcontent"  onclick="closebox()">  </div>-->
 <div id="boxtitle"></div><br><br><br><br>
  <form id="contact" name="uuu" action="about.php" method="POST" enctype="multipart/form-data" onSubmit="return validate1()">
<div class="form_settings"><center><h1><font color="#006600">Upload Photo</font></h1><br><input type="hidden" name="old_file" value="<?php echo $about_qry_row["photo"];?>"><input type="file" name="files"/><br><input class="submit" name="change_pic" type="submit" value="Change..."/></center></div>
</form>
 </div></div>
</body>
</html>
